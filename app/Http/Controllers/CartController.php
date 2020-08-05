<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

class CartController extends Controller
{
    public function listCart(){
        Cart::add('293ad', 'Product 1', 1, 9.99);
        dump(Cart::content());
    }
}
