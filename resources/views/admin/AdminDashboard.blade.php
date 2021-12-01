@extends('admin.MasterLayout')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')

 
       @push('script')
       <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
       <script>
         $(document).ready( function () {
    $('#myTable').DataTable();
} );
       </script>
       @endpush


@endsection
