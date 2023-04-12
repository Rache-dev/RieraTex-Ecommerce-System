@extends('layouts.master')
@section('title','Cart')
@section('content')
    <header class="page-header">
        <h1>Order Successfully placed</h1>        
    </header>
    <section class="page-success">
        <div class="container">
            <div><iframe src="https://giphy.com/embed/DyQrKMpqkAhNHZ1iWe" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
            <h1>Your Order has successfully been placed</h1>
            <h2>Your order ID is: {{$order->id}}</h2>
        </div>
    </section>
@endsection