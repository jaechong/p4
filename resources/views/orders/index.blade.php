@extends('layouts.master')

@push('head')
    <link href='/css/orders/index.css' rel='stylesheet'>
@endpush

@section('title')
    All the books
@endsection

@section('content')

    @if(count($newOrders) > 0)
        <aside id='newOrders'>
            <h2>Recently Added</h2>
            <ul>
                @foreach($newOrders as $book)
                    <li><a href='/orders/{{ $order->id }}'>{{ $order->id }}</a></li>
                @endforeach
            </ul>
        </aside>
    @endif

    <h1>All Orders</h1>
    @if(count($orders) > 0)
        @foreach($orders as $order)
            <a class='order cf' href='/orders/{{ $order->id }}'>
<!--                <h2>{{ $order-> }}</h2>
                <p>{{ $book->plate->getPlateName()  }}</p> -->
            </a>
        @endforeach
    @endif

@endsection