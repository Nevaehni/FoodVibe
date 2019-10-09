@extends('layouts.app')

@section('content')    

    <nav-component 
        :route="{{ json_encode(route('auth.check')) }}"
        :login-route="{{ json_encode(route('login')) }}"
        :profile-update-route="{{ json_encode(route('profile.update')) }}"
        :img-asset="{{ json_encode(asset('images')) }}"
    ></nav-component>

    <search-component
        :blade-token="{{ json_encode(csrf_token()) }}"
        :search-route="{{ json_encode(route('restaurant.search')) }}"
    ></search-component>
    
    <restaurant-component></restaurant-component>

@endsection
