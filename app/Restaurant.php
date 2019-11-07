<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'title', 'address', 'zipcode', 'image', 'city', 'phone', 'email', 'user_id'
    ];

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
