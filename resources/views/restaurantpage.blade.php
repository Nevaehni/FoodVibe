@extends('layouts.app')

@section('content')

    <nav-component></nav-component>
    <search-component></search-component>
    <restaurantpage-component restaurant={{$restaurantData}}></restaurantpage-component>

@endsection