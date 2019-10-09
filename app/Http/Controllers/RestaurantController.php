<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant_schedule;
use App\Restaurant;
use Carbon\Carbon;
use DateTime;


class RestaurantController extends Controller
{
    public function restaurants()
    {       
        $storeSchedule = Restaurant_schedule::where('open_time', '<=', date('Y-m-d H:i:s'))->get();
       
        //Current UNIX timestamp
        $timestamp = time();      
        
        //Get current time object
        $currentTime = (new DateTime())->setTimestamp($timestamp);
         
        //Array with the data
        $status = []; 

        //Loop through time ranges for current day
        foreach ($storeSchedule as $s) {
                     
            // create time objects from start/end times
            $startTime = DateTime::createFromFormat('Y-m-d H:i:s', $s->open_time);
            $endTime   = DateTime::createFromFormat('Y-m-d H:i:s', $s->close_time);
                       
            // check if current time is within a range
            if (($startTime < $currentTime) && ($currentTime < $endTime)) 
            {
                $status[$s->restaurant_id] = ['status' => 'open'];
            }
            else
            {
                $status[$s->restaurant_id] = ['status' => 'closed'];
            }  
        }

        return ['restaurant' => Restaurant::all(), 'time' => $status];

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
