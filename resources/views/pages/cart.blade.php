@extends('layouts.master')
@section('title','Cart')
@section('content')
    <header class="page-header">
        <h1>Cart</h1>
        <h3 class="cart-amount">Ksh {{App\Models\Cart::totalAmount()* 100}}</h3>
    </header>

    @if (session()->has('success'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('success')}}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('home')}}" class="btn btn-outlined">Continue Shopping</a>
                    <a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </section>
    @endif

    <main class="cart-page">
        <div class="cart-wrapper1">
            <div class="cart">
                <div class="cart-container">
                    <header><h2>Cart <span>({{session()->has('cart') ? count(session('cart')) : 0}})</span></h2></header>
                    @if(session()->has('cart') && count(session()->get('cart')) > 0)
                        @foreach (session()->get('cart') as $key => $item)
                        <a href=""></a>
                            <div class="cart-wrapper">
                                <div class="cart-description">
                                    <div class="img">
                                        <img src="{{asset('storage/' . $item['product']['image'])}}" alt="">
                                    </div>
                                    <div class="card-mtm">
                                        <h3 class="cart-item-title">{{$item['product']['title']}}</h3>
                                        <p><span class="label">Color:</span>{{$item['color']['name']}}</p>
                                        <p class="xs">In Stock</p>
                                    </div>
                                    <div class="price">
                                        <p>ksh {{$item['product']['price']}}</p>
                                    </div>
                                </div> 
                                <div class="bt">
                                    <form action="{{route('removeFromCart', $key)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn-deleteCart"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"/></svg>  Remove</button>
                                    </form>
                                    <p><span class="label">Quantity:</span>{{$item['quantity']}}</p>                                   
                                </div>
                            </div>                       
                        @endforeach
                    @else
                    <div class="empty-cart">Your cart is Empty!</div>
                    @endif
                </div>
                <div>
                    <div class="cart-summary">
                        <h4>cart summary</h4>
                        <div class="cart-total">
                            <p>Item's total <span>({{session()->has('cart') ? count(session('cart')) : 0}})</span></p>
                            <h5>Ksh {{App\Models\Cart::totalAmount() * 100}}</h5>
                        </div>
                        <div>
                            <div class="cart-total">
                                <p class="st">Subtotal</p>
                                <h5 class="sh">Ksh {{App\Models\Cart::totalAmount() * 100}}</h5>                        
                            </div>
                            
                        </div>
                        <div class="df">
                            <p>Deliver fees is not included.</p>
                        </div>
                        <a href="{{route('checkout')}}" class="cart-btn btn-primary">Proceed to checkout</a>      
                    </div> 
                </div>
                
            </div>

            
        </div>
    </main>
@endsection