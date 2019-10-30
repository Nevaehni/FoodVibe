<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Order;
use App\User;
use Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('admin')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $userId = $request->user_id;

        $data = User::with('orders.consumableOrders.consumable')->where('id', $userId)->first();                    
          
        //Get data for every consumable
        $ccData = [];
        foreach ($data->orders as $ii => $vv) 
        {    
            $restName = Restaurant::find($vv->restaurant_id)->title;

            $content = '      
                    <div class="panel panel-default order'.$vv->consumableOrders[0]->order_id.'">
                        
                        <div class="panel-heading">                
                            <div data-toggle="collapse" href="#collapse'.$vv->consumableOrders[0]->order_id.'">
                                Order number: '.$vv->consumableOrders[0]->order_id.' - Order day: '.$vv->consumableOrders[0]->created_at->format('d/m/Y').' - Restaurant: '.$restName.'<span style="float:right;"> Total Price: € '.$vv->total.'</span>
                            </div>
                        </div>

                        <div id="collapse'.$vv->consumableOrders[0]->order_id.'" class="panel-collapse collapse">
                        
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">P.P.P</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>';  
                               
          
            foreach ($vv->consumableOrders as $key => $value) 
            {
                $content .= '    
                    <tr>
                        <td>'.$value->consumable->title.'</td>
                        <td>'.$value->quantity.'</td>
                        <td>€ '.$value->total_price/$value->quantity.'</td>
                        <td>'.$value->consumable->category.'</td>
                        <td>€ '.$value->total_price.'</td>                    
                    </tr>
               
                ';      
                
            }  

            $content .='    
                        </tbody>
                        </table>
                    </div>                    
                </div>';
            
            $ccData[$vv->consumableOrders[0]->order_id] = $content;
        }
        
        return $ccData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $order = Order::find($id);
        $order->ConsumableOrders()->delete();
        $order->delete();
    }
}
