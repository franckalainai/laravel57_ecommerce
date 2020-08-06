@extends('frontend.master')

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12">

    <div class="card">

        <ul class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{route('shop.cart.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Shopping Cart</li>

        </ul>

        <div class="card-body">

            <div class="row">

                <div class="col-lg-9 col-md-9 col-sm-12">

                    <table class="table table-hover">

                        <tbody>
                            @foreach($carts as $cart)
                                <tr>

                                    <td>

                                    <img src="{{asset('image/products/'.$cart->model->image)}}" style="width: 100px; height: 100px;">

                                    </td>
                                    <td><strong>{{$cart->model->product_name}}</strong>
                                    <br>
                                    {!!$cart->model->description!!}
                                    </td>
                                    <td>
                                    {{--------Select to update quantity-------}}
                                    <form action="{{route('cart.update')}}" method="post" id="form_update{{$cart->rowId}}">
                                    @csrf
                                    <input type="hidden" name="rowId" value="{{$cart->rowId}}">

                                    <select class="form-control" id="qty" name="qty"
                                    onchange="document.getElementById('form_update{{$cart->rowId}}').submit();"
                                    style="border-radius:none; border:none; background:transparent; font-wheight:none">

                                    @for($i=1; $i<=100; $i++)
                                        <option value="{{$i}}" {{$i==$cart->qty ? 'selected': null}}>{{$i}}</option>
                                    @endfor
                                    </select>

                                    </form>

                                    {{---------------}}
                                    </td>

                                    <td>{{$cart->total}}</td>
                                    <td>
                                    <a href="{{route('cart.remove', $cart->rowId)}}"><i class="fa fa-remove"></i>Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subtotal
                                <span class="badge badge-primary badge-pill">{{Cart::subtotal()}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tax
                                <span class="badge badge-primary badge-pill">{{Cart::tax()}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total
                                <span class="badge badge-primary badge-pill">{{Cart::total()}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">

                        <a href="{{route('checkout.index')}}" class="btn btn-warning btn-sm">Checkout</a>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
