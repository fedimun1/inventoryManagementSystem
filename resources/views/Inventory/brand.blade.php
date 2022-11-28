@extends('admin.MasterLayout')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register Brand</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/brandSave">
                     @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="brand">Brand Name</label>
                  <input name="brand" class="form-control"  placeholder="Enter Brand Name">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

          <div id="" class="col-sm-12">
                <div class="col-sm-12" id="itemsListDiv">
                    <table id="brandTable" class="display" style="border-radius: 10px;color:black ;background-color: #f5f5f5; width: 100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Item Name</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($itemCatagoryall as $cat)
                          <tr>
                          <td>{{$cat->id}}</td>
                          <td>{{$cat->itemCatName}}</td>


                          @endforeach
                          </tr>
                        </tbody>
                    </table>
                </div>

            </div>

@endsection
