<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks_comment';

    protected $fillable = ['user_id','sender','product_id','status','content','created_at','updated_at'];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function senders()
    {
        return $this->hasMany('App\Models\User', 'id', 'sender');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
