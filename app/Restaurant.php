<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Restaurant_consumables()
    {
        return $this->hasMany('App\Restaurant_consumable');
    }

    public function Orders()
    {
        return $this->hasMany('App\Order');
    }
}
