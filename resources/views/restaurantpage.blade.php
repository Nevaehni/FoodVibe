@extends('layouts.app')

@section('content')

    <nav-component 
        :route="{{ json_encode(route('auth.check')) }}"
        :login-route="{{ json_encode(route('login')) }}"
        :img-asset="{{ json_encode(asset('images')) }}"
    ></nav-component>

    <search-component
        :blade-token="{{ json_encode(csrf_token()) }}"
        :search-route="{{ json_encode(route('restaurant.search')) }}"
    ></search-component>
    
    <restaurantpage-component 
        :restaurant={{$restaurantData}}
        :all-cons="{{ json_encode(route('consumables.all')) }}"   
    ></restaurantpage-component>

@endsection