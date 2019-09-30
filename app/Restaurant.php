<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function User()
    {
        $this->belongsTo('App\User');
    }

    public function Restaurant_consumables()
    {
        $this->hasMany('App\Restaurant_consumable');
    }

    public function Orders()
    {
        $this->hasMany('App\Order');
    }
}
