<section class="product-box">
    <div class="image">
        <img src="{{asset('storage/' . $product->image)}}" alt="">
        @auth
            @if (auth()->user()->wishlist->contains($product))
                <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                    @csrf 
                    <button class="add-to-wishlist" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="currentColor" d="M128 226.2a20.1 20.1 0 0 1-14.2-5.8l-83.1-83.1a64.1 64.1 0 0 1 2.5-92.9a62.1 62.1 0 0 1 46-15.6a68.8 68.8 0 0 1 44.1 20l4.7 4.7l6.7-6.8a64.1 64.1 0 0 1 92.9 2.5a62.1 62.1 0 0 1 15.6 46a68.8 68.8 0 0 1-20 44.1l-81.1 81.1a19.8 19.8 0 0 1-14.1 5.8Zm5.6-14.3ZM75 52.7a38.1 38.1 0 0 0-25.7 9.5a40 40 0 0 0-1.6 58.1l80.3 80.3l78.2-78.2c15.9-16 17.5-41.6 3.6-57.1a40 40 0 0 0-58.1-1.6l-15.2 15.2a12 12 0 0 1-17 0l-13.2-13.1A44.2 44.2 0 0 0 75 52.7Z"/></svg></button>
                
                </form>                
            @else

                <form action="{{route('addToWishlist', $product->id)}}" method="post">
                    @csrf 
                    <button class="add-to-wishlist" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="currentColor" d="M128 226.2a20.1 20.1 0 0 1-14.2-5.8l-83.1-83.1a64.1 64.1 0 0 1 2.5-92.9a62.1 62.1 0 0 1 46-15.6a68.8 68.8 0 0 1 44.1 20l4.7 4.7l6.7-6.8a64.1 64.1 0 0 1 92.9 2.5a62.1 62.1 0 0 1 15.6 46a68.8 68.8 0 0 1-20 44.1l-81.1 81.1a19.8 19.8 0 0 1-14.1 5.8Zm5.6-14.3ZM75 52.7a38.1 38.1 0 0 0-25.7 9.5a40 40 0 0 0-1.6 58.1l80.3 80.3l78.2-78.2c15.9-16 17.5-41.6 3.6-57.1a40 40 0 0 0-58.1-1.6l-15.2 15.2a12 12 0 0 1-17 0l-13.2-13.1A44.2 44.2 0 0 0 75 52.7Z"/></svg></button>
                
                </form>                
            @endif           
        @endauth
    </div>
    <a href="{{route('product', $product->id)}}">
        <div class="product-title">{{$product->title}}</div> 
        <p class="product-category">{{$product->category->name}}</p>       
        <div class="product-price">Ksh {{$product->price}}</div>
        
    </a>
</section>