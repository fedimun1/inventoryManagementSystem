@extends('admin.MasterLayout')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register SubCategory</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/subCatSave">
                     @csrf
              <div class="box-body">
                 <div class="form-group">
                  <label for="SubCategory">Category</label>
                
                 <select name="subCatId" class="form-control"  required="required">
                    @foreach($itemCatagory as $cat)
 
                 <option value="{{$cat->id}}">{{$cat->itemCatName}} </option>
                     @endforeach
                    </select>
                       
                </div>

                <div class="form-group">
                  <label for="SubCategory">Sub Category</label>
                  <input name="SubCategoryname" class="form-control"  placeholder="Enter Sub Category" required="">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection