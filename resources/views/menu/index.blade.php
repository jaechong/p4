@extends('layouts.master')

@push('head')
    <link href='/css/orders/show.css' rel='stylesheet'>
@endpush

@section('title')
    Menu
@endsection

@section('content')
    <!--    <div class='container'>-->
    <div class='container'>
        <h1>My Restaurant Menu</h1>
        <h1>Plates</h1>

        @if(count($plates) > 0)
            @foreach($plates as $plate)
                <div class='panel'>
                    <!--                    <a>-->
                    <img src='{{ $plate->image_url }}' class='plate' alt='Plate image for {{ $plate->name }}'>

                    <h2>{{ $plate->name }}</h2>
                    <p>{{ $plate->calory }} Calories</p>
                    <p>${{ $plate->price }}</p>

                    <!--                    </a>-->
                </div>
            @endforeach
        @endif
    </div>
    <div class='container'>
        <h1>Drinks</h1>
        @if(count($drinks) > 0)
            @foreach($drinks as $drink)
                <div class='panel'>
                    <!--                    <a>-->
                    <h2>{{ $drink->name }}</h2>
                    <p>{{ $drink->calory }} Calories</p>
                    <p>${{ $drink->price }}</p>
                    <!--                    </a>-->
                </div>
            @endforeach
        @endif
    </div>

@endsection