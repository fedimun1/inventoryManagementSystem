<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AlephTav</title>
  <link rel="icon" href='\assets\images\alephtav-logo1.jpg'/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="background-color: #001959">
    <!-- Logo -->
    <a href="#" class="logo" style="background-color: #001959" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <div  class="logo" style="display: inline-block;background-color: #001959" >
     <img class="rounded-circle" src="assets\images\alephtav-logo.svg" alt="fedila" style="  padding-top: 0px;  padding-left: 200px; height: 53px;width: 60px; margin-left: 0px;padding-left: 0px">
   </div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #001959" >
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav " style="padding-right: 100px">
              
        <li class="header"><a href="/home">Home</a></li>
           
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"> welcome  {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height: 50px">
                <p style="font-weight: bolder;">
                 {{ Auth::user()->email }}                 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
              <a data-toggle="modal" data-target="#modal_profile">
            <i class="fa fa-user"></i>
            <span  class="nav-link" >Profile</span>
          </a>  </div>
                <div class="pull-right">
                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                       <i class="fa-sign-out"></i>
                                                    <span  class="nav-link" >Log Out</span>
                                                     </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                             </form>
                </div>
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"  >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <br>
        <br>
       <li class="">
          <a href="/CartList">
            <i class="fa fa-laptop"></i>
            <span  class="nav-link" style="font-weight: bold;">Cart List</span>
          </a>
     
        </li>
        <br>
        <br>
         <li class="">
          <a href="/Request">
            <i class="fa fa-laptop"></i>
            <span  class="nav-link" style="font-weight: bold;">Request Form</span>
          </a>
     
        </li>
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
  <div style="min-height:100px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}">
     <div class="row">
        <a href="/CartList" class="col-lg-3 col-xs-6" style="color:black;text-decoration: none;">
          <!-- small box -->
          <div class="small-box " style="background-color:#3E92CC">
            <div class="inner">
              <h3>Carts</h3>
              <p>{{$cartAllcont}} Tender Wait For Approval</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </a>
          <div  class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#3E92CC">
            <div class="inner">
              <h3>Tenders</h3>
              <p>{{$tenderCount}}</p>
            </div>
            <div class="icon">
          <i class="ion ion-document-text"></i>
            </div>
          </div>
         
        </div>
     
        <!-- ./col -->  
        <!-- ./col -->
      </div>


      <!-- /.row -->
      <!-- Main row -->
</div>
    
      <!-- Small boxes (Stat box) -->
     
      <!-- /.row -->
      <!-- Main row -->
    <!-- /.content -->
   <div style="overflow-x: scroll;">
       <table id="myTable" class="table table-striped table-bordered ">
        <tr>
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
              
              </label> 
              <br>
            <input type="checkbox" name="pos" value="posted">
              <label style="cursor:pointer;" for="posted">
                <span style="text-transform:capitalize;">posted</span>
                
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
        </tr>
      </tbody></table>
          </td>
          <td style="width:30px;">&nbsp;</td>
          <td>   <table id="TenderView" class="table table-striped table-bordered ">
        <thead>
          <tr>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Tender Name" data-column="1"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Vendor Name" data-column="2"></td>
           <td> <input type="text" class="form-control filter-input" name="" placeholder="Search By opportunity Status" data-column="3"></td>
            <td><input type="text" class="form-control filter-input" name="" placeholder="Search By posted Date" data-column="4"></td>
            <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Close  Date" data-column="5"></td>

           </tr>
          <tr>
            <th>Tender Name </th>
            <th>Vendor  Name</th>
            <th>Oportunity Status</th>
            <th>Posted date</th>
           <th>Close date</th>
              <th> </th>
               <th> </th>
          <th  style="display: none;">area of work</th>
          </tr>
        </thead>
        <tbody>
           @foreach($tender as $tend)
            <tr>
           
              <td>{{$tend->tend_name}}</td>
              <td>{{$tend->org_name}}</td>
              <td>{{$tend->Opp_Status}}</td>
              <td> {{$tend->rel_date}}</td>
              <td >{{$tend->end_date}}</td>
             <td><a href="/View/{{$tend->id}}/Detail" class="btn btn-primary view">View</a></td>
              <td><a href="/View/{{$tend->id}}/Detail" class="btn btn-primary view">Update</a></td>
             <!--<td><a href="/update/{{$tend->id}}/edit" class="btn btn-primary ">Update</a></td>-->

            <td style="display: none;">{{$tend->areaName}}</td>
        @endforeach
              </tr> 
        </tbody>
      </table></td>
        </tr>
      </table>
    </div>


 

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->


<!-- Bootstrap 3.3.7 -->
<script src="/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="/AdminLTE/ower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE/dist/js/demo.js"></script>


   

<!-- DataTables -->
<!--<script>
  $(function () {
    $('#userlist').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>-->


</body>
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
        });
   
     </script>
</html>
