@extends('admin.adminheader')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register Portfoliio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/Portfoliio">
                     @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="PortfolioName">Name of Portfolio</label>
                  <input name="PortfolioName" class="form-control"  placeholder="Enter Portfolio">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection
