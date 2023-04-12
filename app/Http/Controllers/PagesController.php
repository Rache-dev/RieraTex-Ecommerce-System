<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // home methods
    public function home()
    {
        $products = Product::with('category', 'colors')->paginate(4);        
        return view('pages.home', ['products' => $products]);
    }
    //cart methods
    public function cart()
    {
        //dd(session()->get('cart'));
        return view('pages.cart');
    }

    public function wishlist()
    {
        $products = Auth::User()->wishlist;
        return view('pages.wishlist', ['products' => $products]);
    }

    public function account()
    {
        return view('pages.account');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
    public function success()
    {
        return ('Success');
    }
    public function product($id)
    {
        $product = Product::with('category', 'colors')->findOrFail($id);
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->paginate(4); 
        return view('pages.product', ['product' => $product], ['products' => $products]);
    }
    public function store()
    {
        $products = Product::with('category', 'colors')->orderBy('created_at', 'asc')->paginate(4);
        return view('pages.productAll', ['products' => $products]);
    }
}
