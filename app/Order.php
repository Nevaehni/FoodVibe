<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function ConsumableOrders()
    {
        return $this->hasMany('App\ConsumableOrder');
    }
    
    public function Restaurants()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function Users()
    {
        return $this->belongsTo('App\User');
    }
}
