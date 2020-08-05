<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Model\Product;

class CartController extends Controller
{
    public function addCart($id=null){
        $product = Product::find($id);
        $card = Cart::add($product->id, $product->product_name, 1, $product->price)->associate('App\Model\Product');
        return redirect()->route('shop.cart.index')->with(compact('card', 'product'));
    }

    public function readCart(){
        $carts = Cart::content();
        $i=0;
        return view('shop.index')->with(compact('carts', 'i'));
    }

    public function updateCart(){
        Cart::update(request()->rowId, request()->qty);
        return back();
    }
}
