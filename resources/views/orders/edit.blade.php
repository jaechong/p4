@extends('layouts.master')

@section('title')
    Edit  {{$order->name}}
@endsection

@push('head')
    <link href='/css/orders/form.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')

    <div class='panel'>

        <h1>Edit</h1>
        <h2>{{ $order->name }}'s Order</h2>

        <form method='POST' action='/orders/{{ $order->id }}'>
            {{ method_field('put') }}
            {{ csrf_field() }}

            @include('orders.orderFormInputs')

            <input type='submit' value='Save changes' class='btn btn-primary'>
        </form>

        @include('modules.error-form')

    </div>

@endsection