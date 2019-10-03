<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function restaurants()
    {
        return Restaurant::all();
    }  

    public function restaurantPage($id)
    {
        return view('restaurantpage')->with('restaurantData', $id);
    }  

    public function consumables($id)
    {        
        return Restaurant::with('restaurant_consumables.consumable')->where('id', $id)->first();
    }  
}
