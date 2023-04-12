@extends('layouts.master')
@section('title','wishlist')
@section('content')
    <header class="page-header">
        <h1>Wishlist</h1>
    </header>

    @if(count($products)==0)
        <div class="empty-cart">Your cart is Empty!</div>

    @else

        <div class="container" style="padding:80px 15px;">
            <div class="products-row">
                @foreach ($products as $product) 
                    <x-product-box :product="$product"/>
                @endforeach
            </div>
        </div>

    @endif
@endsection