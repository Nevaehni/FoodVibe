<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumableOrder extends Model
{
    public function Consumable()
    {
        return $this->belongsTo('App\Consumable');
    }

    public function Orders()
    {
        return $this->belongsTo('App\Order');
    }
}
