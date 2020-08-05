<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Product;

class FrontEndController extends Controller
{
    public function index(){

        $products = Product::orderBy('id', 'desc')->paginate(8);
        $i=0;
        return view("shop.shoppingcart")->with(compact('products', 'i'));
    }
}
