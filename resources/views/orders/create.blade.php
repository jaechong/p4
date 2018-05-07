@extends('layouts.master')

@section('title')
    New order
@endsection

@push('head')
    <link href='/css/orders/form.css' type='text/css' rel='stylesheet'>
@endpush


@section('content')

    <h1>Add a new order</h1>

    <form method='POST' action='/orders'>
        {{ csrf_field() }}

        @include('orders.orderFormInputs')

        <input type='submit' value='Add order' class='btn btn-primary'>
    </form>

    @include('modules.error-form')

@endsection