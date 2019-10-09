<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
