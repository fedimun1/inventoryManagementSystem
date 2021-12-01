@extends('User.UserHeader')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@section('content')
     <div class="box box-info" style="margin-top: 100PX">
          @include('FlashMessage.flashMessage')
  
            <div class="box-header with-border">
              <h3 class="box-title">Request Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/Request" method="post">
               @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Type<span style="color: red">*</span></label>
                  <div class="col-sm-10">
                     <select name="Req_type" class="form-control"  required="required">
                          <option value="" selected disabled hidden>Please Select Type Type Here</option>
                          <option value="AreaOfWork">Area Of Work</option>
                          <option value="Requirnment">Requirment </option>
                           <option value="Portfolio">Portfolio</option>
                         </select>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Name<span style="color: red">*</span></label>
                  <div class="col-sm-10">
                    <input name="Req_name" type="" class="form-control" id="" placeholder="Name" required="">
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Value</label>
                  <div class="col-sm-10">
                    <input name="Req_value" type="" class="form-control" id="" placeholder="Value">
                  </div>
                </div>
                <br>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Summery</label>
                  <div class="col-sm-10">
                    <textarea class="col-sm-10" name="Req_summery"></textarea>
                  </div>
                </div>
                 <br>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Send To</label>
                  <div class="col-sm-10">
                   <select id="assign_id" name="AssignEmail" class="form-control" required="required">
                    @foreach($userList as $userList)
                        <option value="{{$userList->id}}">Email : {{$userList->email}} -- Role  :{{$userList->role}}</option>
                           @endforeach
                     </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"style="margin-left: 900px">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 
       @push('script')
       <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
       <script>
         $(document).ready( function () {
    $('#myTable').DataTable();
} );
       </script>
       @endpush

@endsection