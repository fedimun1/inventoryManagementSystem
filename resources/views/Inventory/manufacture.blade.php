@extends('admin.MasterLayout')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register Manufacturer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/manufactureSave">
                     @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="manufacture">Manufacturer Name</label>
                  <input name="manufacture" class="form-control"  placeholder="Enter Manufacturer">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">save</button>
              </div>
            </form>
          </div>
@endsection
