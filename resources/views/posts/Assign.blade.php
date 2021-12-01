
@extends('master')
@section('content')
<div class="container">
<div style="margin-top: 20px" class="shadow-lg p-3 mb-5 bg-white rounded">
  <div style="margin-top: 30px;margin-left: 150px">
  <form>
  	<div class="form-group row shadow-lg p-3 mb-5 bg-white rounded">
    <label style="text-align: right;" class="col-sm-2 col-form-label">Tender_Name</label>

<select style="width: 500px" id="tend_id" class="rounded-pill">
	@foreach($data as $d)
	<option>{{$d->tend_name}}</option>
	@endforeach
</select>
  </div>
  <br>
 	<div class="form-group row" style="padding-left: 20px">
    <label style="text-align: right;" class="col-sm-3 col-form-label">Technical Proposal </label>

<select style="width: 500px" id="tend_id" class="rounded-pill">
<option> abebe
</option>
</select>
  </div>
   <br>
 	<div class="form-group row" style="padding-left: 20px">
    <label style="text-align: right;" class="col-sm-3 col-form-label">Financial  Proposal </label>

<select style="width: 500px" id="tend_id" class="rounded-pill">
<option> abebe
</option>
</select>
  </div>
   <br>
 	<div class="form-group row" style="padding-left: 20px">
    <label style="text-align: right;" class="col-sm-3 col-form-label"> Bio and  Credential </label>

<select style="width: 500px" id="tend_id" class="rounded-pill">
<option> abebe
</option>
</select>
  </div>
   <br>
 	<div class="form-group row" style="padding-left: 20px">
    <label style="text-align: right;" class="col-sm-3 col-form-label"> Company Profile and labels
     </label>

<select style="width: 500px" id="tend_id" class="rounded-pill">
<option> abebe
</option>
</select>
  </div>
   <br>
 	<div class="form-group row" style="padding-left: 20px">
    <label style="text-align: right;" class="col-sm-3 col-form-label">Other  </label>

<select style="width: 500px" id="tend_id" class="rounded-pill">
<option> abebe
</option>
</select>
  </div>
  <input type="hidden" name="_token" value="{{ Session::token() }}">
   <div style="padding-left: 700px;padding-top:50px"><button type="submit" class="btn btn-primary btn-lg">Assign</button>
</div>
  </form>

    

  </div>
</div>

</div>


<script type="text/javascript">
	
	$('#tend_id').select2({

      placeholder:"Serch here",
      allowClear:true,
      matcher:function(term,text){
      	return text.toUpperCase().indexOf()(term.toUpperCase())==0;
      }
	});
</script>
<!--<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

	var CSRF_TOKEN=$('meta[name="csrf-token"]').attr('content');
	$(document).ready(function(){
        $('#tend_name').select2({
        	ajax:{
        		url:'/getTender',
        		type:'post',
        		delay:250,
        		success:function(data){
        alert(data);
    },error:function(){ 
        alert("error!!!!");
    }
        		//data:function(params)
        	//	{
        		//	return{
        				//_token:CSRF_TOKEN,
        				//search:params.term
        			///}
        		//},
        	//	processResult:function(rersponse){
        		//	return
        		//	{
                        // results:rersponse
        			//}

        		//},
        		//cache:true
        	}
        });
	});

</script>-->

@endsection