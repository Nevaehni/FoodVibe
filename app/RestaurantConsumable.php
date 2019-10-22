<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantConsumable extends Model
{
    public function Consumable()
    {
        return $this->belongsTo('App\Consumable');
    }

    public function Restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
