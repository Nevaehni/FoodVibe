<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function restaurants()
    {
        return Restaurant::all();
    }   
}
