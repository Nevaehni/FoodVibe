<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request = $request->all();

        $newRestaurant = new Restaurant;    
        $newRestaurant->fill(array_filter($request))->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request = $request->all();

        $RestaurantFind = Restaurant::find($id);    
        $RestaurantFind->fill(array_filter($request))->save();
        
        $arr = [
            $id,
            $request['title'], 
        ];
        
        return $arr;
    }

    public function destroy($id)
    {
        $Restaurant = Restaurant::find($id);
        $Restaurant->delete();
    }
}
