@extends('layouts.app')

@section('content')

    <nav-component 
        route="{{ route('auth.check') }}"
        login-route="{{ route('login') }}"
        img-asset="{{ asset('images') }}"       
    ></nav-component>

    <search-component
        blade-token="{{ csrf_token() }}"
        search-route="{{ route('restaurant.search') }}"
    ></search-component>
    
    <restaurantpage-component 
        restaurant={{ $restaurantData }}
        all-cons="{{ route('consumables.all') }}"   
        cart-route="{{ route('cart.add') }}"
        cart-session= @json(session()->get('cart'))
    ></restaurantpage-component>
    
  

@endsection