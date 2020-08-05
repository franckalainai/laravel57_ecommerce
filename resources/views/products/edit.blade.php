@extends('layouts.app')
@section('content')

<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-xs-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Update Product</h3>
            <a href="{{route('products.index')}}" class="btn btn-primary btn-sm pull-right">Product List</a>

          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="box-body">
              <div class="form-group">
                <label>Category name</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">-----Select-----</option>
                    @foreach($categories as $key => $c)
                    <option value="{{$key}}" {{ $product->category_id == $key ? 'selected':null }}>{{$c}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Product name</label>
              <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}" class="form-control" placeholder="Product name">
              </div>

              <div class="form-group">
                <label>Quantity</label>
              <input type="text" name="qty" id="qty" value="{{$product->qty}}" class="form-control" placeholder="Quantity">
              </div>

              <div class="form-group">
                <label>Price</label>
              <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control" placeholder="Price">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" id="description" value="{{$product->description}}" class="form-control" placeholder="Description">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image" id="image">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Image Gallery</label>
                <input type="file" name="imageGalleries[]" id="imageGalleries" multiple placeholder="image gallery">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>

      <div class="col-xs-6">
        <ul class="list-group">
        @foreach($imageGalleries as $key => $image)
        <li class="list-group-item"><img src="{{asset('image/galleries/'.$image->gallery_image)}}" class="img-thumbnail" style="width: 60px; height: 60px;"></li>
        @endforeach
        </ul>
      </div>
    </div>
</section>

@endsection
