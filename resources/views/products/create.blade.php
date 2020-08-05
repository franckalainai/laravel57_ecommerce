@extends('layouts.app')
@section('content')

<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create Product</h3>
            <a href="{{route('products.index')}}" class="btn btn-primary btn-sm pull-right">Product List</a>

          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Category name</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">-----Select-----</option>
                    @foreach($categories as $key => $c)
                    <option value="{{$key}}">{{$c}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Product name</label>
              <input type="text" name="product_name" id="product_name" value="{{old('product_name')}}" class="form-control" placeholder="Product name">
              </div>

              <div class="form-group">
                <label>Quantity</label>
              <input type="text" name="qty" id="qty" value="{{old('qty')}}" class="form-control" placeholder="Quantity">
              </div>

              <div class="form-group">
                <label>Price</label>
              <input type="text" name="price" id="price" value="{{old('price')}}" class="form-control" placeholder="Price">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" id="description" value="{{old('descrition')}}" class="form-control" placeholder="Description">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image" id="image" value="{{old('image')}}" placeholder="image">
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
    </div>
</section>

@endsection
