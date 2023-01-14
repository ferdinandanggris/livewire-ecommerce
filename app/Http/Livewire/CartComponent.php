<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;



class CartComponent extends Component
{

    public $listener = [
        'increaseQuantity'
    ];
    public $cart;
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        return redirect()->route('product.cart');
    }

        public function decreaseQuantity($rowId)
        {
            $product = Cart::get($rowId);
            $qty = $product->qty - 1;
            Cart::update($rowId,$qty);
            return redirect()->route('product.cart');
        }

        public function render()
        {
            if (Auth::check()) {
                # code...
                Cart::instance()->store(Auth::user()->email);
            }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
