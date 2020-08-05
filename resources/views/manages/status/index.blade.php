@extends('layouts.app')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Status Informations</h3>
            <a href="{{route('status.create')}}" class="btn btn-primary btn-sm pull-right">
            <span class="fa fa-plus"></span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>status</th>
                  <th>Created</th>
                  <th>Last Update</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($status as $key => $s)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$s->status}}</td>
                        <td>{{$s->created_at}}</td>
                        <td>{{$s->updated_at}}</td>
                        <td><a href="{{route('status.destroy', $s->id)}}">Delete</a></td>
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

