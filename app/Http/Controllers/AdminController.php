<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
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
        return view('admin');
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
    public function show()
    {
        $userId = Auth::id();

        $data = User::with('orders.consumableOrders.consumable')->where('id', $userId)->first();
            
        $consumable = null;
        $content = "";
        $header = "";
        //Get data for every consumable

        $restName = Restaurant::find($data->id)->title;
        foreach ($data->orders as $ii => $vv) 
        {                
            foreach ($vv->consumableOrders as $key => $value) 
            {
                $content .= 
                '
                <div class="panel-group col-md-4">
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">                
                            <span data-toggle="collapse" href="#collapse1"></span>
                        </div>

                        <div id="collapse1" class="panel-collapse collapse">
                        
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">P.P.P</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>'.$value->consumable->title.'</td>
                                    <td>'.$value->quantity.'</td>
                                    <td>'.$value->total_price/$value->quantity.'</td>
                                    <td>'.$value->consumable->category.'</td>
                                    <td>'.$value->total_price.'</td>                    
                                </tr>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                ';                
            }               
        }
        
        
        
        

        

        return $content;
        // return json_encode(array($content, $header));
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
        //
    }
}
