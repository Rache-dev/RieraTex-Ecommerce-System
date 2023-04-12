@extends('layouts.master')
@section('title', $product->title)
@section('content')
    @if (session()->has('addedToCart'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('addedToCart')}}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('home')}}" class="btn btn-outlined">Continue Shopping</a>
                    <a href="{{route('cart')}}" class="btn btn-primary">Go To Cart</a>
                </div>
            </div>
        </section>
    @endif
<!-- product page -->
    <div class="product-page">
        <div class="container" style="padding-bottom: 80px;">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="{{asset('storage/' . $product->image)}}" alt="">
                    <div>
                        <p style="font-size: 14px; text-transform:uppercase; font-weight:600; padding-bottom:10px;">Share this product</p>
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-2 -2 24 24"><g fill="currentColor"><path d="M8.695 6.937v1.377H7.687v1.683h1.008V15h2.072V9.997h1.39s.131-.807.194-1.69h-1.576v-1.15c0-.173.226-.404.45-.404h1.128V5h-1.535C8.644 5 8.695 6.685 8.695 6.937z"/><path d="M10 18a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0 2C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10s-4.477 10-10 10z"/></g></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z"/></svg>
                        </div>
                    </div>
                </section>
                <div class="product-page-details">
                    <p class="p-title">{{$product->title}}</p>
                    <p class="p-price">Ksh{{$product->price}}</p>
                    <p class="p-category">{{$product->category->name}}</p>
                    <p class="p-description">{{$product->description}}</p>
                    <form action="{{route('addToCart', $product->id)}}" method="post">
                        @csrf 
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Color</label>
                                <select name="color" id="color" required>
                                    <option value="">-- Color --</option>
                                    @foreach ($product->colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="p-quantity">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" min="1" max="100" value="1" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-cart">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
        <section class="products-section" style="background-color: #fdfdfd;">
            <div class="container">
                <h1 class="section-title">Related products</h1>
                <div class="products-row">
                    @foreach ($products as $product) 
                        <x-product-box :product="$product"/>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection