@extends('layouts.app')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Color Informations</h3>
            <a href="{{route('color.create')}}" class="btn btn-primary btn-sm pull-right">
            <span class="fa fa-plus"></span></a>

            <a href="{{route('color.restore')}}" class="btn btn-danger btn-sm pull-right">
            <span class="fa fa-trash"></span>Restore</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>Description</th>
                  <th>Created</th>
                  <th>Last Update</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colors as $key=>$c)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$c->color_name}}</td>
                        <td>{{$c->description}}</td>
                        <td>{{$c->created_at}}</td>
                        <td>{{$c->updated_at}}</td>
                        <td><a href="{{route('color.destroy', $c->id)}}">Delete</a></td>
                    </tr>
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

