<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class CustomerloginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $r){
        $this->validate($r, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->guard('customer')->attempt(['email' => $r->email, 'password' => $r->password], $r->remember)){
            return redirect()->intended(route('customer.home'));
        }

        return redirect()->back()->withErrors($r->only('email', 'remember'));
    }

    public function logout(){
        auth()->guard('customer')->logout();
        return redirect()->route('shop.cart.index');
    }
}
