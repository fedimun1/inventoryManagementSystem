@extends('User.UserHeader')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@section('content')
<div style="padding:20px">
<div style="margin-top: " class="shadow-lg p-3 mb-5 bg-white rounded">
    <div  style="overflow-x: scroll;">
      <hr>
      <!--    <h2>Tender List</h2>-->
  
      <table id="myTable" class="table table-striped table-bordered ">

        <thead>
        <tr>
          <td><input type="text" class="form-control filter-input" name="" placeholder="Search By TenderID" data-column="0"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Tender Name" data-column="1"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Vendor Name" data-column="2"></td>
        
           </tr>
          <tr>
            <th>Tender Id </th>
            <th>Requested By</th>
            <th>Status</th>     
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
           @foreach($cartAll as $d)
         
            <tr>
              <td>{{$d->tend_id}}</td>
              <td>{{$d->name}}</td>
              @if($d->status==0)
               <td>Waiting For Approval...</td>
               @endif
            <td><a href="/View/{{$d->tend_id}}/Detail" class="btn btn-primary view">View</a></td>
             <td><button type="button" class="btn btn-primary">continue For Approval </button></td>
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