@extends('layouts.master')
@section('name', 'Home page')
    
@section('content')
<main class='homepage'>

    @include('pages.components.home.header')
    <section class="products-section">
        <div class="container">
            <h1 class="section-title">Featured products</h1>
            <div class="products-row">
                @foreach ($products as $product) 
                    <x-product-box :product="$product"/>
                @endforeach

                <!-- <div>{{$products->links()}}</div> -->
            </div>
            <a href="{{route('store')}}" style="width: 200px;" class="cart-btn btn-primary">More Products</a>
        </div>
    </section>

    
</main>
@endsection