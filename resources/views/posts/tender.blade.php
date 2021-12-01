@extends('header')
@section('css')
<style type="text/css">
  <style>
.modal-dialog {
          width: 1000px !important;
          height:600px !important;
        }
.modal-content {
    /* 80% of window height */
    height: 60%;
    background-color:#BBD6EC;
}        
.modal-header {
    background-color: #001959;
    padding:16px 16px;
    color:#FFF;
    border-bottom:2px dashed #337AB7;
 }
.modal-body {
  position: relative;
  padding:0px;
}
   @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 1300px; /* New width for default modal */
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection
@section('content')
<div style="padding: 0px 10px 0px 10px;
    clear: both;
    height: 100%;
     margin-left: 0px;
    margin-right: 0px;
     margin-top: 80px;
    max-width: 100%;">
<div style="margin-top: 0px" class="shadow-lg p-3 mb-5 bg-white rounded">
    <div style="overflow-x: scroll;">
      <table>
       <tbody>
         <tr>
          <!---for filter criteria-->     
           <td style="width: 250px;vertical-align: top;background-color: azure;" >
            <table style="margin-top: 0px;margin:20px" width="100%" cellpadding="0" cellspacing="0" border="0" class="formpanel">
              <tbody>
          <tr>
          <td  style="text-transform:uppercase; font-weight:bold;">Opportunity Status:</td>
        </tr>
          <td >
            <div style="margin-top: 10px;" id="position">
                <input type="checkbox" name="pos" value="Forcasted">
              <label style="cursor:pointer;" for="forecasted">
                <span style="text-transform:capitalize;">forecasted</span>
                &nbsp;(<span id="forecastedCount">{{$forcast}}</span>)&nbsp;&nbsp;
              </label> 
              <br>
            <input type="checkbox" name="pos" value="posted">
              <label style="cursor:pointer;" for="posted">
                <span style="text-transform:capitalize;">posted</span>
                &nbsp;(<span id="postedCount"> {{$post}}</span>)&nbsp;&nbsp;
              </label>
            </div>
           <hr style="width: 250px; border-top: 5px dashed #001959;">
          </td>
           <tr style="margin-top: 200px">
          <td  id="showmenu" style="text-transform:uppercase; font-weight:bold; margin-top: 50px">Area Of Works:
          <span style="margin-left: 105px"> <i style="" class="fa fa-plus"></i></span>
          </td>
        </tr>
          <td >
            <div style="margin-top: 10px; display: none;" id="ofc" class="menu" >
             @foreach($workArea as $area)
              <input type="checkbox" name="ofc" value="{{$area->areaName}}">
              <label style="cursor:pointer;" for="forecasted">
                <span style="text-transform:capitalize;">{{$area->areaName}}</span>
                &nbsp;<span id="areacount"></span>&nbsp;&nbsp;
              </label> 
              <br>
              @endforeach
            </div>
          </td>
              </tbody>
            </table>
           </td>
           <!--- Endfor filter criteria-->  
           <!---for gap-->     
           <td style="width:30px;">&nbsp;</td>
           <!--- Endfor gap--> 
           <!---fo viewing table-->     
               <td class="tedview">   
      <table id="TenderView" class="table table-striped table-bordered ">
        <thead>
          <tr>
          <td><input type="text" class="form-control filter-input" name="" placeholder="Search By TenderID" data-column="0"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Tender Name" data-column="1"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Vendor Name" data-column="2"></td>
           <td> <input type="text" class="form-control filter-input" name="" placeholder="Search By opportunity Status" data-column="3"></td>
            <td><input type="text" class="form-control filter-input" name="" placeholder="Search By posted Date" data-column="4"></td>
            <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Close  Date" data-column="5"></td>

           </tr>
          <tr>
            <th>Tender ID</th>
            <th>Tender Name </th>
            <th>Vendor  Name</th>
            <th>Oportunity Status</th>
            <th>Posted date</th>
           <th>Close date</th>
              <th> </th>
          <th  style="display: none;">area of work</th>
          </tr>
        </thead>
        <tbody>
           @foreach($tender as $tend)
            <tr>
              <td >{{$tend->id}}</td>
              <td>{{$tend->tend_name}}</td>
              <td>{{$tend->org_name}}</td>
              <td>{{$tend->Opp_Status}}</td>
              <td> {{$tend->rel_date}}</td>
              <td >{{$tend->end_date}}</td>
             <td><a href="/View/{{$tend->id}}/Detail" class="btn btn-primary view">View</a></td>
             <!--<td><a href="/update/{{$tend->id}}/edit" class="btn btn-primary ">Update</a></td>-->

            <td style="display: none;">{{$tend->areaName}}</td>
        @endforeach
              </tr> 
        </tbody>
      </table>
    </td>
           <!--- Endfor viewing table-->  
         </tr>
       </tbody>
      </table>
    </div>
  </div>
</div>

@csrf
       @push('script')
       <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>   
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <!-- Script that used to filter  data by column-->
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
      
      if (positions.indexOf(searchData[3]) !== -1) {
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
      
      if (offices.indexOf(searchData[7]) !== -1) {
        return true;
      }
      
      return false;
    }
  );
  

  var table = $('#TenderView').DataTable();
  
 $('input:checkbox').on('change', function () {
    table.draw();
 });

} );
       </script>
       <script type="">
       $(document).ready(function() {
        var  otable= $('#TenderView').DataTable();
        $('.filter-input').keyup(function(){
          otable.column($(this).data('column'))
          .search($(this).val())
          .draw();
        })
       });
       </script>
<!-- Script used to align items on modal -->
 
     <script type="text/javascript">
        $("#showmenu").click(function() {
                $('.menu').slideToggle("fast");
                $('.tedview').style.padding=0;
        });
   
     </script>
       @endpush


@endsection
