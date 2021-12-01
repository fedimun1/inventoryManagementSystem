@extends('header') 
@section('content')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<div class="container">
<div style="margin-top: 100px" class="shadow-lg p-3 mb-5 bg-white rounded">
  <div style="margin-top: 30px;margin-left: 20px">
  	<form  action="/update/{tenderregisters}/edit" method="post"><div class="form-group  p-3 mb-5 bg-white rounded">
  <label style="text-align: right;" class="col-sm-2 col-form-label">Tender ID</label>
   <select style="width: 500px" id="tend_id" >
	@foreach($data as $d)
	<option value='{{$d->TendId}}'>{{$d->TendId}}</option>
	@endforeach
</select>
<button type="submit"> find Document  </button>
  </div></form>
  	</div>
       <table id="TenderView" class="table table-striped table-bordered ">
        <thead>
          <tr>
            <th>Title</th>
            <th>Document Name </th>
            <th> </th>
          </tr>   
        </thead>
        <tbody>
            <tr>
              <td >BID</td>
              <td id="BID"></td>
              <td><a  id="viewDocument1" class="btn btn-primary documentView">View</a></td>
            </tr> 
            <tr>
              <td id="">TOR</td>
              <td id="TOR"></td>
             <td><a id="viewDocument2" href="#" class="btn btn-primary view">View</a></td>
            </tr> 
              <tr>
              <td id="">Eligiblity</td>
              <td id="Eligiblity"></td>
             <td><a id="viewDocument3" href="#" class="btn btn-primary view">View</a></td>
            </tr> 
                 <tr>
              <td id="">Evaluatiion</td>
              <td id="Evaluatiion"></td>
             <td><a id="viewDocument4" href="#" class="btn btn-primary view">View</a></td>
            </tr> 
        </tbody>
      </table>
  </div>  
</div>
 @push('script')
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script type="text/javascript">
 	$('#tend_id').select2();
 </script>
 <script type="text/javascript">
       $('#tend_id').on('select2:select',function(e){
     $data= $("#tend_id").val(); 
   $.get('TenderDocumentList/' +  $data +'/edit', function (data) {
   // alert(data.id);
         // console.log(data);
       //  $('#userShowModal').html("User Details");
        //  $('#ajax-modal').modal('show');

         document.getElementById('BID').innerHTML =data.BID;
         document.getElementById('TOR').innerHTML =data.TOR;
         document.getElementById('Eligiblity').innerHTML =data.Evaluation;
         document.getElementById('Evaluatiion').innerHTML =data.Eligiblity;
         document.getElementById('viewDocument1').href ='/documentdetailshow/' + data.TendId  ;
         document.getElementById('viewDocument2').href ='/documentTORshow/' + data.TendId  ;
           document.getElementById('viewDocument3').href ='/documentEligiblitydetailshow/' + data.TendId  ;
         document.getElementById('viewDocument4').href ='/documentEvaluationTORshow/' + data.TendId  ;


        
         // $('#email').val(data.email);
      })

    })
 </script>
  @endpush
@endsection
