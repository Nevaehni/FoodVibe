<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {        
        return Order::with('consumableOrders.consumable')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request = $request->all();

        $newOrder = new Order;    
        $newOrder->fill(array_filter($request))->save();
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

        $OrderFind = Order::find($id);    
        $OrderFind->fill(array_filter($request))->save();
        
        $arr = [
            $id,
            $request['title'], 
        ];
        
        return $arr;
    }

    public function destroy($id)
    {
        $Order = Order::find($id);
        $Order->delete();
    }
}
