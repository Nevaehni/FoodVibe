<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function update(request $request)
    {
        $request->validate([ 
            'name' => ['required', 'string', 'max:255'],            
            'address' => ['required', 'string', 'min:2'],
            'city' => ['required', 'string', 'min:2'],
            'zipcode' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = Auth::user();
            
        //Check if password matches if not throw error
        if (!Hash::check($request->password, $user->password))
        {        
            return redirect()->back()->with('error', 'Password mismatch');
        }
     
        $user->name = $request->name;      
        $user->address = $request->address;      
        $user->city = $request->city;      
        $user->zipcode = $request->zipcode;      
        $user->phone = $request->phone;      
        $user->email = $request->email;    
        $user->save();

        return redirect()->back()->with('success', 'Updated succesfully');
    }

    public function authCheck()
    {
        return Auth::user();
    }

    public function userOrders()
    {        
        $orders = Order::with('consumableorders')->where('user_id', Auth::id())->get();

        $data = array();

        foreach ($orders as $key) {            
            $totalprice = 0;

            foreach ($key->consumableorders as $cons) {
                $totalprice += $cons->total_price;
            };

            $data[$key->id] = [
                'order_id' => $key->id,
                'order_date' => $key->created_at,               
                'total_price' => $totalprice,               
            ];   
        }

        return $data;
    }   

}
