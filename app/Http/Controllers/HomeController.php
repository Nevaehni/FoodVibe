<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Auth;

class HomeController extends Controller
{  
    public function index()
    {     
        return view('home');
    }    

    

    public function authCheck()
    {
        return Auth::user();
    }   

    public function restaurantSearch(request $request)
    {        
   
        if($request->input != '')
        {
            $query = $request->input;
            $data = Restaurant::where('title', 'LIKE', "%".$query."%")->get();
            $output = '';
            foreach($data as $d)
            {                
                $output .= '<li style="list-style: none;"><a href="'. route('restaurant.page', [$d->id]) .'">'. $d->title .'</a></li>';
            }           
            return $output;
        }
    }
}
