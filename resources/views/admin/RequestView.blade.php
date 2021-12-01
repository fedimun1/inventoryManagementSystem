@extends('admin.adminheader')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@section('content')
<div>
<div style="padding:20px" class="shadow-lg p-3 mb-5 bg-white rounded">
    <div  style="overflow-x: scroll;">
      <h2>Request List</h2>
      <hr>
      <!--    <h2>Tender List</h2>-->
       @include('FlashMessage.flashMessage')
      <table id="myTable" class="table table-striped table-bordered ">
        <thead>
        <tr>
          <td><input type="text" class="form-control filter-input" name="" placeholder="Search Requested by" data-column="0"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Request Name" data-column="1"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Request Type" data-column="2"></td>
            <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Value" data-column="2"></td>
           </tr>
          <tr>
            <th>Requested By </th>
            <th>Request Name</th>
            <th>Request Type</th>
            <th>Request Value</th>
            <th>Request Summery</th> 
            <th></th>        
          </tr>
        </thead>
        <tbody>
           @foreach($allRequest as $d)
         
            <tr>
               <td>{{$d->name}}</td>
               <td>{{$d->Req_name}}</td>
              <td>{{$d->Req_type}}</td>
              <td>{{$d->Req_value}}</td>
              <td>{{$d->Req_summery}}</td>
             <td><a href="/update/{{$d->id}}/Request" class="btn btn-primary view">Done</a></td>
              <
            </tr>   
        @endforeach
        </tbody>

       
      </table>
    </div>

</div>
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