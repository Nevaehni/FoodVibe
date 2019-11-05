<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consumable;

class ConsumableController extends Controller
{    
    public function index()
    {
        return Consumable::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request = $request->all();

        $newConsumable = new Consumable;    
        $newConsumable->fill(array_filter($request))->save();
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

        $ConsumableFind = Consumable::find($id);    
        $ConsumableFind->fill(array_filter($request))->save();
        
        $arr = [
            $id,
            $request['title'], 
        ];
        
        return $arr;
    }

    public function destroy($id)
    {
        $Consumable = Consumable::find($id);
        $Consumable->delete();
    }
}
