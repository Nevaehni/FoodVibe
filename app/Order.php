<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function Consumable_orders()
    {
        return $this->hasMany('App\Consumable_order');
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
