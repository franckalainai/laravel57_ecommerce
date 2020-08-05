@extends('layouts.app')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Informations</h3>
            <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm pull-right">New Category</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>Description</th>
                  <th>Active</th>
                  <th>Created</th>
                  <th>Last update</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $c)
                    <tr>
                    <td>{{++$key}}</td>
                    <td>{{$c->category_name}}</td>
                    <td>{{$c->description}}</td>
                    <td>{{$c->is_active}}</td>
                    <td>{{$c->created_at}}</td>
                    <td>{{$c->updated_at}}</td>
                    <td>
                    <img src="{{asset('image/categories/'.$c->image)}}" style="width: 80px; height: 50px;">
                    </td>
                    <td>
                        <a href="{{route('categories.edit', $c->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('categories.destroy', $c->id)}}" class="btn btn-danger btn-sm"
                        onclick="event.preventDefault();document.getElementById('category-form-delete').submit();">Delete</a>
                    </td>
                    </tr>

                    <form action="{{route('categories.destroy', $c->id)}}" method="post" id="category-form-delete" >
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$c->id}}">
                    </form>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

