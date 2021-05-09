<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $fillable = [
        'user_id', 'status', 'quantity', 'total_price', 'created_at','updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id','id');
    }
}
