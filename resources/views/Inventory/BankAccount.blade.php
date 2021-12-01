@extends('admin.MasterLayout')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register Bank  Account</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/saveAccount">
                     @csrf
              <div class="box-body">
                 <div class="form-group">
                  <label for="Bank">Bank</label>
                
                 <select name="bankID" class="form-control"  required="required">
                    @foreach($getBank as $bank)
 
                 <option value="{{$bank->id}}">{{$bank->name}} </option>
                     @endforeach
                    </select>
                       
                </div>

                <div class="form-group">
                  <label for="AcHolder">Account Holder Name</label>
                  <input name="AcHolder" class="form-control"  placeholder="Enter Account Holder" required="">
                </div>
                  <div class="form-group">
                  <label for="AccNumber">Account Number</label>
                  <input name="AccNumber" class="form-control"  placeholder="Enter Account Number" required="">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection