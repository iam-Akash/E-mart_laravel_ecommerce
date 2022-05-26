<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable= ['title',
     'slug', 'summary' , 'description','stock',
    'price','offer_price','discount',  'size' ,'photo' , 'condition', 'status',
    'brand_id','parent_category_id','child_category_id','vendor_id' ];
}
