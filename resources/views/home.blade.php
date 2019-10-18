@extends('layouts.app')

@section('content')    

    <nav-component 
        route="{{ route('auth.check') }}"
        login-route="{{ route('login') }}"
        profile-update-route="{{ route('profile.update') }}"
        img-asset="{{ asset('images') }}"
    ></nav-component>

    <search-component
        blade-token="{{ csrf_token() }}"
        search-route="{{ route('restaurant.search') }}"
    ></search-component>
    
    <restaurant-component></restaurant-component>

@endsection
