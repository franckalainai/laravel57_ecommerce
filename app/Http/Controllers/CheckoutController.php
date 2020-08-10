<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
use App\Model\ShippingAddress;
use App\Model\Order;
use App\Model\OrderItem;
use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $customer;

    public function __construct()
    {
        $this->middleware('auth:customer')->except('index');
    }

    public function index()
    {
        if(auth()->guard('customer')->check()){
            $c = auth()->guard('customer')->user(); //c = customer
            $carts = Cart::content();
            return view('checkout.index')->with(compact('carts', 'c'));
        }else{
            session()->put('checkout_url', 'checkout.index');
            return redirect()->route('customer.login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $stripe = new Stripe('sk_test_ekHEsZ0D6wMLcJGkenE3PORZ00MGL1bZSp');
            $charge = $stripe->charges()->create([

                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email
            ]);

            if($charge){
                $this->customer = auth()->guard('customer')->user();

                $order = new Order;
                $order->customer_id = $this->customer->id;
                $order->payment_id = 11;
                $order->status_id = 1;

                if($order->save()){

                    foreach(Cart::content() as $key => $cart){
                        $item = new OrderItem;
                        $item->order_id = $order->id;
                        $item->product_id = $cart->id;
                        $item->color_id = 1;
                        $item->price = $cart->price;
                        $item->qty = $cart->qty;
                        $item->amount = $cart->total;
                        $item->save();
                    }
                    $request->merge([
                        'customer_id' => $this->customer->id,
                        'order_id' => $order->id
                    ]);

                    if(ShippingAddress::create($request->all())){
                        Cart::destroy();
                    }
                }
                return redirect()->route('thank');
            }

        }catch(Exception $e){
            echo 'Error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
