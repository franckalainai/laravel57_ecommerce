@extends('layouts.app')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Color Informations</h3>
            <a href="{{route('color.restore.info')}}"
            onclick="event.preventDefault();document.getElementById('form-restore').submit();"
            class="btn btn-primary btn-sm pull-right">
            <span class="fa fa-trash"></span></a>

            <a href="{{route('color.index')}}" class="btn btn-danger btn-sm pull-right">
            <span class="fa fa-trqsh"></span>Color List</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{route('color.restore.info')}}" method="get" id="form_restore">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>
                    <input type="checkbox" id="chk">
                  </th>
                  <th>#</th>
                  <th>name</th>
                  <th>Description</th>
                  <th>Created</th>
                  <th>Last Update</th>
                  <th>Deleted At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colors as $key=>$c)
                    <tr>
                        <td type="checkbox" name="id[]" value="{{$c->id}}" class="id"></td>
                        <td>{{++$key}}</td>
                        <td>{{$c->color_name}}</td>
                        <td>{{$c->description}}</td>
                        <td>{{$c->created_at}}</td>
                        <td>{{$c->updated_at}}</td>
                        <td>{{$c->deleted_at}}</td>
                        <td><a href="{{route('color.restore.info', $c->id)}}" class="btn btn-danger btn-xs" title="Restore">
                            <span class="fa fa-download"></span>
                        </a></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              </form>
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

