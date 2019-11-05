<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
        $request = $request->all();

        if($request['password'])
        {            
            $request['password'] = bcrypt($request['password']);            
        }

        $newUser = new User;    
        $newUser->fill(array_filter($request))->save();

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

        if($request['password'])
        {            
            $request['password'] = bcrypt($request['password']);            
        }

        $userFind = User::find($id);    
        $userFind->fill(array_filter($request))->save();
        
        $arr = [
            $id,
            $request['name'], 
        ];
        
        return $arr;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
