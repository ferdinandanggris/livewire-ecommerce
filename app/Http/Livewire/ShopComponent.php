<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class ShopComponent extends Component
{


    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('succes_message','Item add to cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;

    public function render()
    {
        $product = Product::paginate(12);
        if (Auth::check()) {
            # code...
            Cart::instance()->store(Auth::user()->email);
        }
        return view('livewire.shop-component',['products'=>$product])->layout('layouts.base');
    }
}
