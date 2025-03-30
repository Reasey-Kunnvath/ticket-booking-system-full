<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function CartIndex(){
        return view('frontend.cart.cart');
    }

    public function checkout(){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Event ABC',
                            'images' => ['https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pexels.com%2Fsearch%2Fevent%2F&psig=AOvVaw39nZpVWEf9Eg3rn1lhg-Fg&ust=1738406601195000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIDZkbHjn4sDFQAAAAAdAAAAABAE'],
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('Cart'),
        ]);
        return redirect()->away($session->url, 303);
    }

    public function success(){
        return view('frontend.cart.cart');
    }
}
