@extends('layouts.master')

@push('head')
    <link href='/css/orders/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $order->name }}
@endsection

@section('content')
    <div class='container'>

        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete <strong>{{ $order->name }}'s order?</strong>?</p>

        <form method='POST' action='/orders/{{ $order->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
        </form>

        <p class='cancel'>
            <a href='/orders'>No, I changed my mind.</a>
        </p>
        </form>
    </div>
@endsection
