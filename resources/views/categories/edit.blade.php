@extends('layouts.app')
@section('content')

<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit caegory</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="box-body">
              <div class="form-group">
                <label>Category name</label>
              <input type="text" name="category_name" id="category_name" value="{{$category->category_name}}" class="form-control" placeholder="Enter name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" id="description" value="{{$category->description}}" class="form-control" placeholder="Description" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Active</label>
                <input type="checkbox" name="is_active" id="is_active"

                {{$category->is_active!=0? 'checked':null}}

                value="{{$category->is_active}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image" id="image">
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
