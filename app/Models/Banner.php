<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','description','photo','status','condition'];


    public function scopeActiveBanners($query){
        return $query->where('status', 'active');
    }
}
