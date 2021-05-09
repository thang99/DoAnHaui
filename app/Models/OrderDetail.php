<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orders_detail';

    protected $fillable = [
        'order_id', 'quantity', 'product_id', 'unit_price', 'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
