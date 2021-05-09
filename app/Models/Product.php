<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name','ram','cpu','hard_drive','screen','size','price','operator_system','image','status','quantity',
        'description','origin','year_of_launch','manufacturer_id'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    
    // public function categories()
    // {
    //     return $this->belongsToMany('App\Models\Category','category_product','category_id','product_id');
    // }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function category_products()
    {
        return $this->hasMany('App\Models\CategoryProduct');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
    
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
