<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public function render()
    {
        if (Auth::check()) {
            # code...
            Cart::instance()->restore(Auth::user()->email);
        }
        return view('livewire.home-component')->layout('layouts.base');
    }
}
