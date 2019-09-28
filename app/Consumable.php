<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    public function Restaurants()
    {
        $this->belongsToMany('App\Restaurant');
    }

    public function Consumable_orders()
    {
        $this->hasMany('App\Consumable_order');
    }
}
