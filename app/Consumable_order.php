<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable_order extends Model
{
    public function Consumables()
    {
        $this->belongsTo('App\Consumable');
    }

    public function Orders()
    {
        $this->belongsTo('App\Order');
    }
}
