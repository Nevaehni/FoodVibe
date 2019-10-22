<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    public function RestaurantConsumables()
    {
        return $this->belongsToMany('App\RestaurantConsumable');
    }

    public function ConsumableOrders()
    {
        return $this->hasMany('App\ConsumableOrder');
    }
}
