@extends('layouts.app')
@section('content')

<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create Status</h3>
            <a href="{{route('color.index')}}" class="btn btn-primary btn-sm pull-right">
            Status List</a>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" action="{{route('status.store')}}" method="post">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Status name</label>
              <input type="text" name="status" id="status" value="{{old('status')}}" class="form-control" placeholder="Status">
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

