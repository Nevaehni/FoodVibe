<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant_schedule;
use App\Restaurant_consumable;
use App\Restaurant;
use App\Consumable;
use App\User;
use Carbon\Carbon;
use DateTime;
use Auth;



class RestaurantController extends Controller
{
    public function restaurants()
    {       
        $currentTime = Carbon::now('Europe/Amsterdam');

        $storeSchedule = Restaurant_schedule::where('closed_from', '<', $currentTime)->get();
      
        if($storeSchedule->isEmpty())
        {
            $storeSchedule = false;
        }       
         
        //Array with the data
        $status = []; 

        //Loop through time ranges for current day
        if($storeSchedule != false)
        {
            foreach ($storeSchedule as $s) {
                
                // create time objects from start/end times
                $closed_from   = Carbon::createFromFormat('Y-m-d H:i:s', $s->closed_from, 'Europe/Amsterdam');
                $closed_till   = Carbon::createFromFormat('Y-m-d H:i:s', $s->closed_till, 'Europe/Amsterdam');
                    
                // check if current time is within a range
                if (($closed_from < $currentTime) && ($currentTime < $closed_till)) 
                {
                    $status[$s->restaurant_id] = 'closed';
                } 
            }
            return ['restaurant' => Restaurant::all(), 'time' => $status];
        }

        return ['restaurant' => Restaurant::all(), 'time' => false];

    }  

    public function restaurantPage($id)
    {
        return view('restaurantpage')->with('restaurantData', $id);
    }  

    public function consumables($id)
    {        
        return Restaurant::with('restaurant_consumables.consumable')->where('id', $id)->first();
    }  

    public function allConsumables()
    {        
        return Consumable::all();
    } 

    public function store(request $request)
    {        
        $restID = restaurant::where('user_id', Auth::id())->first()->id;

        $newCons = new Restaurant_consumable;
        $newCons->restaurant_id = $restID;
        $newCons->consumable_id = $request->storeID;
        $newCons->price = number_format((float)$request->price, 2, '.', '');
        $newCons->category = Consumable::find($request->storeID)->category;
        $newCons->save();

        return redirect()->back();   
    }  

    public function delete(request $request)
    {        
        $restID = restaurant::where('user_id', Auth::id())->first()->id;
        Restaurant_consumable::where('consumable_id', $request->deleteID)->where('restaurant_id', $restID)->delete();

        return redirect()->back()->with('Success', 'Deleted successfully');
    } 
    
    public function check()
    {       
        return Restaurant::where('user_id', Auth::id())->first();
    }

}
