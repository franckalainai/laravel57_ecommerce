@extends('layouts.app')
@section('content')

<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create category</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Category name</label>
              <input type="text" name="category_name" id="category_name" value="{{old('category_name')}}" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" id="description" value="{{old('descrition')}}" class="form-control" placeholder="Description">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image" id="image" value="{{old('image')}}" placeholder="image">
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
