<!DOCTYPE html>
<html>
  <head>


    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>   
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset=utf-8 />
    <title>DataTables - JS Bin</title>
  </head>
  <body>
    <div>
      <ul class="list-group">
           
                  <li class="list-group-item">{{$tenderall->areaofwork->areaName}}</li>
    
    
</ul>
    </div>
  </body>
</html>
<script type="text/javascript">
	$(document).ready( function () {
  $.fn.dataTable.ext.search.push(
    function( settings, searchData, index, rowData, counter ) {
      var positions = $('input:checkbox[name="pos"]:checked').map(function() {
        return this.value;
      }).get();
   
      if (positions.length === 0) {
        return true;
      }
      
      if (positions.indexOf(searchData[1]) !== -1) {
        return true;
      }
      
      return false;
    }
  );

  
  $.fn.dataTable.ext.search.push(
    function( settings, searchData, index, rowData, counter ) {
   
      var offices = $('input:checkbox[name="ofc"]:checked').map(function() {
        return this.value;
      }).get();
   

      if (offices.length === 0) {
        return true;
      }
      
      if (offices.indexOf(searchData[2]) !== -1) {
        return true;
      }
      
      return false;
    }
  );
  

  var table = $('#example').DataTable();
  
 $('input:checkbox').on('change', function () {
    table.draw();
 });

} );

</script>