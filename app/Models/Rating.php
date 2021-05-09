<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'user_ratings';

    protected $fillable = ['user_id','product_id','evaluate'];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function product()
    {
        return $this->belongsToMany('App\Models\Product');
    }
    
}
