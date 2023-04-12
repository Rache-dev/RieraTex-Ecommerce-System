@extends("layouts.master")
@section('title', 'Products')
@section('content')
    <header >
        <h1 style="color: #000; text-align: center; font-size:36px; padding: 80px 0 0px 0px">Our Products</h1>
    </header>

    <section class="products-section">
        <div class="container">            
            <div class="products-row">
                @foreach ($products as $product) 
                    <x-product-box :product="$product"/>
                @endforeach
                <!--  -->
                
            </div>  
            {{ $products->links() }}         
        </div>
    </section>

@endsection