@extends('layouts.app')
@section('content')

<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create Color</h3>
            <a href="{{route('color.index')}}" class="btn btn-primary btn-sm pull-right">
            Color List</a>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" action="{{route('color.store')}}" method="post">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Color name</label>
              <input type="text" name="color_name" id="color_name" value="{{old('color_name')}}" class="form-control" placeholder="Color name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" id="description" value="{{old('descrition')}}" class="form-control" placeholder="Description">
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

