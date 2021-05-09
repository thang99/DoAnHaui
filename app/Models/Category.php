<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name','content','image'];

    // public function products()
    // {
    //     return $this->belongsToMany('App\Models\Product','category_product','product_id','category_id');
    // }

    public function category_products()
    {
        return $this->hasMany('App\Models\CategoryProduct');
    }
}
