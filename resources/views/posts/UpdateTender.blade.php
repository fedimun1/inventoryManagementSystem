@extends('header')
@section('content')

<div class="container">
<div style="margin-top: 100px" class="shadow-lg p-3 mb-5 bg-white rounded">
  <div style="margin-top: 30px;margin-left: 20px">
  <form  style="padding-left:100px"  action="/post/{{$tend->id}}" method="post" enctype="multipart/form-data">
         @method('PUT')
    @csrf
      <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Tender id </label>
    <div class="col-sm-5">
      <input name="TendId " readonly class="form-control rounded-pill "value=" {{$tend->TendId}}">   
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Tender Name</label>
    <div class="col-sm-5">
      <input name="tend_name"  class="form-control rounded-pill " value=" {{$tend->tend_name}}">  
    </div>
  </div>
  <br>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Organization Name</label>
    <div class="col-sm-5">
      <input name="org_name" class="form-control rounded-pill " value=" {{$tend->org_name}}">  
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Bid Number</label>
    <div class="col-sm-5">
      <input name="bid_num" type="Number" class="form-control rounded-pill "  value="{{$tend->bid_num}}">     
    </div>
  </div>
  <br>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-5">  
     <select name="type" class="form-control"  required="required" >
     <option value="{{$tend->type}}">{{$tend->type}}</option>
      <option value="selective tender">selective tender</option>
      <option value="open tender">open tender </option>
      <option value="negoatiated tender">negoatiated tender </option>
      <option value="single stage  tender">single stage  tender </option>
      <option value="two stage tender">two stage tender</option>
  </select>

    </div>
  </div> 
  <br>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Relase Date</label>
    <div class="col-sm-5">
      <input name="rel_date" type="Date" class="form-control rounded-pill " value="{{$tend->rel_date}}" > 
    </div>
  </div>
   <br>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Dead Line</label>
    <div class="col-sm-5">
      <input name="end_date" type="Date" class="form-control rounded-pill " value="{{$tend->end_date}}" >   
    </div>
  </div>
   <br>
   <!-- <div class="form-group row ">
    <label  class="col-sm-2 col-form-label ">Document</label>
    <div class="col-sm-5 rounded-pill"  >
      <label  class="form-group row rounded-pill">
  <input  style="display: none;" type="file" class="form-control-image">
  <span class="btn btn-secondary rounded-pill " style="background-color: white;color: black">{{$tend->doc}}"</span>
</label> 
  
    </div>
  </div>-->
  


   <br>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">contact No</label>
    <div class="col-sm-5">
      <input name="contact" type="Number" class="form-control rounded-pill " value="{{$tend->contact}}" > 
    </div>
  </div>
  <br>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-5">
      <input name="email" type="Email" class="form-control rounded-pill " value="{{$tend->email}}" > 
    </div>
  </div>
   <br>
   <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Summery</label>
    <div class="col-sm-10">
        <textarea name="summery"   class="ckeditor  form-control" > {{$tend->summery}}</textarea>

    </div>
  </div>
 <div style="padding-left: 850px;padding-top:20px"><button type="submit" class="btn btn-primary btn-lg">Update</button>
</form>
  </div>
</div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection