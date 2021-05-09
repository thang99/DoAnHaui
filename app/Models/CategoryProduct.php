<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $fillable = ['category_id','product_id','created_at','updated_at'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
