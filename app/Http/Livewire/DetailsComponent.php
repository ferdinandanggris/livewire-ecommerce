<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Mail\Mailables\Content;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        // Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flush('success_message','Item add to cart');
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        
        return redirect()->route('product.cart');
    }
    
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        if (Auth::check()) {
            # code...
            Cart::instance('cart')->store(Auth::user()->email);
        }
        return view('livewire.details-component',['product'=>$product])->layout('layouts.base');
    }
}
