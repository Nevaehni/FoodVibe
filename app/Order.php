<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function Consumable_orders()
    {
        $this->hasMany('App\Consumable_order');
    }
    
    public function Restaurants()
    {
        $this->belongsTo('App\Restaurant');
    }

    public function Users()
    {
        $this->belongsTo('App\User');
    }
}
