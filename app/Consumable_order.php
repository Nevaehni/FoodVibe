<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable_order extends Model
{
    public function Consumables()
    {
        return $this->belongsTo('App\Consumable');
    }

    public function Orders()
    {
        return $this->belongsTo('App\Order');
    }
}
