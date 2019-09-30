<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    public function Restaurant_consumables()
    {
        $this->belongsToMany('App\Restaurant_consumable');
    }

    public function Consumable_orders()
    {
        $this->hasMany('App\Consumable_order');
    }
}
