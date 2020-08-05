@extends('frontend.master')

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12">

    <div class="card">
        <ul class="breadcrumb">

            <li class="breadcrumb-item active">Home</li>
            <li></li>

        </ul>

        <div class="card-body">

            <div class="row">
                @foreach($products as $key => $p)
                    <div class="col-lg-3 col-md-3 col-sm-12">

                        <form action="#" method="post">

                            <h6 class="card-title bg-info text-white p-2 text-uppercase">{{$p->product_name}}</h6>

                            <div class="card-body">
                            <img src="{{asset('image/products/'.$p->image)}}" class="img-fluid mb-2" style="width:100%; height:150px">
                            <hr>

                            <h6 class="card-subtitle mb-2 text-muted">{{$p->price}}
                            <span>{{$p->discount}}% off</span>
                            </h6>
                            <h6 class="badge badge-success">4.4 <i class="fa fa-star"></i></h6>
                            </div>

                            <div class="btn-group d-flex">
                            <button class="btn btn-success flax-fill">Add To cart</button>
                            <button class="btn btn-warning flax-fill text-white">Like</button>
                            </div>

                        </form>

                    </div>
                @endforeach
            </div>
        </div>

    </div>

    {{$products->render()}}

</div>

@endsection
