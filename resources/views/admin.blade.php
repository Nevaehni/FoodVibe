@extends('layouts.app')

@section('content') 

<admin-component></admin-component>

{{-- <div class="manage_users">
    
    <select onchange="" class="browser-default custom-select">    
        <option disabled selected>Select user</option> 
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{$user->name}}</option>  
        @endforeach
    </select>
    
</div>

<div class="container">
    <table class="table table-dark table-bordered myTable">
        <thead>
            <tr>
                <th>User</th>
                <th>Order id</th>
                <th>Order date</th>
                <th>Restaurant</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->name }}</th>
                </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div> --}}

@endsection