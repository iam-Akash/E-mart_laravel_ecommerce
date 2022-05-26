<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable= ['title',
     'slug', 'summary' , 'description','stock',
    'price','offer_price','discount',  'size' ,'photo' , 'condition', 'status',
    'brand_id','parent_category_id','child_category_id','vendor_id' ];

    public function category(){
        return $this->belongsTo(Category::class, 'parent_category_id', 'id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
