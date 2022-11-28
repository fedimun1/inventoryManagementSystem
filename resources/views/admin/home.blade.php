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
  <link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="AdminLTE/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
          <a href="/RequestView">
          <i class="fa fa-fw fa-edit"></i>
            <span  class="nav-link" >Request Cart</span>
          </a>
     
        </li>
       <li class="">
          <a href="/register">
            <i class="fa fa-laptop"></i>
            <span  class="nav-link" >Register User</span>
          </a>
     
        </li>
         <li class="">
          <a href="/StaffRegister">
            <i class="fa fa-laptop"></i>
            <span  class="nav-link" >Register Staff</span>
          </a>
     
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Portfolio"><i class="fa fa-circle-o"></i> Register Portfolio</a></li>
            <li><a href="areofWork"><i class="fa fa-circle-o"></i> Register Area</a></li>
             <li><a href="Department"><i class="fa fa-circle-o"></i> Register Department</a></li>
              <li><a href="Requirnment"><i class="fa fa-circle-o"></i> Register Requirnment</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
  <div style="min-height: 100px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div id="totaluserlist" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#3E92CC">
            <div class="inner">
              <h3>{{$totaluser}}</h3>

              <p>number of users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </div>
         <div  id="adminuserlist" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#3E92CC">
            <div class="inner">
              <h3>{{$adminuser}}</h3>

              <p>Admin Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </div>
           <div id="tendercheckerlist" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#3E92CC">
            <div class="inner">
              <h3>{{$tenderchecker}}</h3>

              <p>tender checkers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </div>
         <div id="tenderadminlist" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#3E92CC">
            <div class="inner">
              <h3>{{$tenderAdmin}}</h3>

              <p>Tender Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </div>
          <div  id="tenderEncoderlist" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#3E92CC">
            <div class="inner">
              <h3>{{$tenderEncoder}}</h3>

              <p>Tender Encoder</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </div>
         <div  id="subjectMatterExpertList" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#3E92CC">
            <div class="inner">
              <h3>{{$subjectExpert}}</h3>

              <p>Subject Matter Expert</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
         
        </div>
           <div href="/RequestView"  id="" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green " >
            <div class="inner">
              <h3>{{$RequestCart}}</h3>

              <p style="font-weight: bolder;">Requests on  Cart</p>
            </div>
            <div class="icon">
           <span class="glyphicon glyphicon-edit"></span>
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
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userlist" class="table table-bordered table-striped">
              <thead>
                <td style="display: none;"><input type="text" class="form-control filter-input" name="" placeholder="Search By User Nmae" data-column="0"></td>
            <td><input type="text" class="form-control filter-input" name="" placeholder="Search By User Nmae" data-column="1"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Email" data-column="2"></td>
           <td><input type="text" class="form-control filter-input" name="" placeholder="Search By Role" data-column="3"></td>
          <tr>
            <th style="display: none;"></th>
            <th>User Name </th>
            <th>Email Adrerss</th>
            <th>Role</th>     
            <th></th>
          </tr>
        </thead>
        <tbody>
           @foreach($list as $d)
            <tr>
              <td style="display: none;">{{$d->id}}</td>
              <td>{{$d->name}}</td>
              <td>{{$d->email}}</td>
               <td>{{$d->role}}</td>
             <td><a href="#" class="btn btn-primary view">Update</a></td>
            </tr>  
        @endforeach
        </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
  <!--modal for profile-->

<div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=""> {{ Auth::user()->name }}  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group row">
    <label style="text-align: right" class=" col-sm-3 "for="">Use Name</label>
    <div  style="padding: 0px" class="col-sm-8"> <input readonly=""  id="" class="form-control  "  placeholder="" value=" {{ Auth::user()->name }}  ">
      
   </div>
  </div>
<div class="form-group row">
    <label style="text-align: right" class=" col-sm-3 "for="">Email</label>
    <div  style="padding: 0px" class="col-sm-8"> <input readonly=""  id="" class="form-control" placeholder="" value= {{ Auth::user()->email }}  >
      
   </div>
  </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end for modal profile-->

<!-- Modal  user detail view
-->
<form> 
</form>
<div class="modal fade" id="detailview" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/updareuser/{}" method="post" id="edituserform"> 
           @method('PUT')
            @csrf
          <div class="modal-body">
      <div class="form-group row">
    <label style="text-align: right" class=" col-sm-3 "for="">Use Name</label>
    <div  style="padding: 0px" class="col-sm-8"> <input name="name"  id="name" class="form-control  "  placeholder="">
   </div>
  </div>
<div class="form-group row">
    <label style="text-align: right" class=" col-sm-3 "for="">Email</label>
    <div  style="padding: 0px" class="col-sm-8"> <input type="email"  name="email" id="email" class="form-control" placeholder="">
   </div>
  </div>
  <div class="form-group row">
    <label style="text-align: right" class=" col-sm-3 "for="">Role</label>
    <div  style="padding: 0px" class="col-sm-8">
        <select id="role" type="select" class="form-control" name="role" required>
                                    <option  value="SystemAdmin">Admin</option>
                                    <option value="tenderAdmin">Tender Admin</option>
                                    <option value="tenderEncoder">Tender Encoder</option>
                                    <option value="tenderchecker">Tender Checker</option>
                                </select>
   </div>
  </div>

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
          </form>   
    </div>
  </div>
</div>

  

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong><a href="#">Alephtav consultancy</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="AdminLTE/bAdminLTE/ower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="AdminLTE/dist/js/demo.js"></script>
<script src="Adminlte/../../bower_components/jquery/dist/jquery.min.js"></script>

<!-- DataTables -->
<script src="AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
<script type="text/javascript">
    $(document).ready(function() {
       
      var oTable = $('#userlist').DataTable({});
       $("#tenderEncoderlist").click(function(e){
        oTable.search("tenderEncoder").draw();
           });
       $("#tenderadminlist").click(function(e){
        oTable.search("tenderAdmin").draw();
           });
       $("#totaluserlist").click(function(e){
        oTable.search("").draw();
           });
       $("#adminuserlist").click(function(e){
        oTable.search("SystemAdmin").draw();
           });
        $("#tendercheckerlist").click(function(e){
        oTable.search("tenderchecker").draw();
           });
         $("#subjectMatterExpertList").click(function(e){
        oTable.search("SubMaterExpert").draw();
           });

       });
</script>
<script>
       $(document).ready(function() {
        var  otable= $('#userlist').DataTable();
        $('.filter-input').keyup(function(){
          otable.column($(this).data('column'))
          .search($(this).val())
          .draw();
        })
       });
       </script>
        <script>
         $(document).ready( function () {
      var  otable= $('#userlist').DataTable();
      otable.on('click','.view',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child'))
        {
          $tr=$tr.prev('.parent')
        }
        var data=otable.row($tr).data();
        $('#name').val(data[1]);
        $('#email').val(data[2]);
        $('#role').val(data[3]);
        $('#edituserform').attr('action','/updareuser/'+data[0]);
        $('#detailview').modal('show');



      })
      } );
       </script>
</body>
</html>
