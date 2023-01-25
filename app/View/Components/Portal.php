<?php

namespace App\View\Components;
use App\Models\Cart;
use Illuminate\View\Component;

class Portal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(auth()->check()) {
            $cartCount = Cart::where('user_id', auth()->id())->count();
            return view('layouts.portal',['cartCount'=>$cartCount]);
        }
       
    }
}
