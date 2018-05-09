@extends('layouts.master')

@section('title')
    All the orders
@endsection

@section('content')
    <div class='panel'>

        <h1>All Orders</h1>

        @if(count($orders) > 0)
            @foreach($orders as $order)
                <div class='order'>
                    <a class='order cf' href='/orders/{{ $order->id }}'></a>
                    <h2>Order ID: {{ $order->id }} Name: {{ $order->name }}</h2>
                    <p>{{ $order->plate->name  }}</p>
                    <li><a href='/orders/{{ $order->id }}/edit'><i class="fas fa-pencil-alt"></i> Edit</a>
                    <li><a href='/orders/{{ $order->id }}/delete'><i class="fas fa-trash-alt"></i> Delete</a>
                </div>
            @endforeach

        @endif
    </div>
@endsection