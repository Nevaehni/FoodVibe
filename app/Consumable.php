<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    protected $fillable = [
        'title', 'image', 'category'
    ];

    public function RestaurantConsumables()
    {
        return $this->belongsToMany('App\RestaurantConsumable');
    }

    public function ConsumableOrders()
    {
        return $this->hasMany('App\ConsumableOrder');
    }
}
