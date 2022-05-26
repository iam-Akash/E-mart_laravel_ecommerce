<?php

namespace App\Models;


use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','photo','status','parent_id', 'is_parent'];

    public static function shiftChild($child_categories){
        return Category::whereIn('id', $child_categories)->update(['is_parent'=>1]);
    }
    public static function getChildCategory($id){
        return Category::where('parent_id', $id)->pluck('title', 'id');
    }
    public function scopeActiveCategories($query){
        return $query->where('status', 'active');
    }

    public function products(){
        return $this->hasMany(Product::class, 'parent_category_id', 'id');
    }
}
