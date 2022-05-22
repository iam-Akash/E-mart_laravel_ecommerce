<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','photo','status','parent_id', 'is_parent'];

    public static function shiftChild($child_categories){
        return Category::whereIn('id', $child_categories)->update(['is_parent'=>1]);
    }
}
