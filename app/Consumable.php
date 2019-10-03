<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    public function Restaurant_consumables()
    {
        return $this->belongsToMany('App\Restaurant_consumable');
    }

    public function Consumable_orders()
    {
        return $this->hasMany('App\Consumable_order');
    }
}
