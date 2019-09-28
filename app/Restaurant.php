<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function User()
    {
        $this->belongsTo('App\User');
    }

    public function Consumables()
    {
        $this->belongsToMany('App\Consumable');
    }

    public function Orders()
    {
        $this->hasMany('App\Order');
    }
}
