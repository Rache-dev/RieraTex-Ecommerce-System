<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request){
        
        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
        ]);
        
        \Stripe\Stripe::setApiKey("sk_test_51MjbhpDaDediTcsKGgAKSk04zDwlpop3ylK9e9KPfo7FUshJLkyvEnPwLq7LxF0AqxGRLz8GdV1J76yJwVrhTrSm00dqKON8Dp");


        $intent = null;
        try {
            if($request->payment_method_id) {
                #create paymentintent
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' =>$request->payment_method_id,
                    'amount' => Cart::totalAmount() * 100,
                    'currency' => 'Kes',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
            }
            
        } catch(\Stripe\Exception\ApiErrorException $e) {

            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

        //store the order
        $order = Order::create([
            'user_id'  =>auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'stripe_id' => $request->payment_method_id,
            'status' => 'pending',
            'total' => Cart::totalAmount() * 100
        ]);

        //adding items in the cart to the database
        foreach(session()->get('cart') as $item)
        {
            $order->items()->create([
                'product_id' => $item['product']['id'],
                'color_id' => $item['color']['id'],
                'quantity' => $item['quantity'],
            ]);
        }
        //deleting everything in the cart after payment 
        session()->forget('cart');

        return view('pages.orderSuccess', ['order' => $order]);
    }
}
