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

            <table class="table table-borderless table-condensed">

                <tbody>
                    @foreach($carts as $cart)
                        <tr>

                            <td>

                            <img src="{{asset('image/products/'.$cart->model->image)}}" style="width: 100%; height: 100px;">

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

                            <select class="form-control" name="qty"
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
                            <a href=""><i class="fa fa-remove"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

            </div>

        </div>

    </div>

</div>

@endsection
