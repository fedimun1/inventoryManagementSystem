@extends('master')
@section('content')

<div class="container">
<div style="margin-top: 20px" class="shadow-lg p-3 mb-5 bg-white rounded">
  <div style="margin-top: 30px;margin-left: 20px">
    <form  style="padding-left:100px"  action="Tender" method="post" enctype="multipart/form-data">
    @csrf
    
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Staff First Name </label>
    <div class="col-sm-5">
      <input name="staff_Fname"  class="form-control rounded-pill " >
    </div>
  </div>
  <br>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Staff Last Name</label>
    <div class="col-sm-5">
      <input name="staff_Lname" class="form-control rounded-pill " >
    </div>
  </div>
 <div style="padding-left: 1069;padding-top:20px"><button type="submit" class="btn btn-primary btn-lg">Save</button>
</div>
</form>
  </div>
</div>
</div>

@endsection