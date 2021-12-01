@extends('admin.home')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
<div style="margin-top: 100px" class="shadow-lg p-3 mb-5 bg-white rounded">
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
            <th>User Nameeeee </th>
            <th>Email Adrerss</th>
            <th>Role</th>     
            <th></th>
          </tr>
        </thead>

        <tbody>

           @foreach($list as $d)
         
            <tr>

              <td>{{$d->name}}</td>
              <td>{{$d->email}}</td>
               <td>{{$d->role}}</td>
             <td><button type="button" class="btn btn-primary">View</button></td>
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
