@extends('admin.adminheader')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register Requirnments</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/RequirnmentSave">
                     @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="ReqNmae">Requirnment Name</label>
                  <input name="ReqNmae" class="form-control"  placeholder="Enter Requirnment Name">
                </div>
                  <div class="form-group">
                  <label for="ReqReference">Requirnment Reference</label>
                  <input name="ReqReference" class="form-control"  placeholder="Enter Requirnment Refernce">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection
