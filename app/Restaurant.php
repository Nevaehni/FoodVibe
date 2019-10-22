<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function RestaurantConsumables()
    {
        return $this->hasMany('App\RestaurantConsumable');
    }

    public function Orders()
    {
        return $this->hasMany('App\Order');
    }
}
