<!DOCTYPE html>
<html>

<head>
    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AlephTav</title>
  <link rel="icon" href='\assets\images\alephtav-logo1.jpg' />
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

@yield('css')
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" style="height: auto; min-height: 100%;">

    <header class="main-header" style="background-color: #001959">
      <!-- Logo -->
      <a href="#" class="logo" style="background-color: #001959">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <div class="logo" style="display: inline-block;background-color: #001959">
          <img class="rounded-circle" src="assets\images\alephtav-logo.svg" alt="fedila" style="  padding-top: 0px;  padding-left: 200px; height: 53px;width: 60px; margin-left: 0px;padding-left: 0px">
        </div>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" style="background-color: #001959">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

          <ul class="nav navbar-nav " style="padding-right: 100px">


            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"> welcome {{ Auth::user()->name }}</span>
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
                      <span class="nav-link">Profile</span>
                    </a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                      <i class="fa-sign-out"></i>
                      <span class="nav-link">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>


    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->

        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="">
            <a href="/dashboard">
              <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/Inventory">
              <i class="fa fa-fw fa-list-alt"></i> <span>Stock</span>
            </a>
          </li>
           <li>
            <a href="/Store">
              <i class="fa fa-fw fa-table"></i> <span>Store</span>
            </a>
          </li>
            <li>
            <a href="/Shop">
              <i class="fa fa-fw fa-list-alt"></i> <span>Shop</span>
            </a>
          </li>
          <li>
            <a href="/transaction">
              <i class="glyphicon glyphicon-btc"></i> <span>Transactions</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-lock"></i> <span>Admin Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/register">
                  <i class="glyphicon glyphicon-duplicate"></i>
                  <span class="nav-link">Register User</span>
                </a></li>
            </ul>
          </li>
           <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-wrench"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="category"><i class="fa fa-circle-o"></i> Register Category</a></li>
            <li><a href="subcategory"><i class="fa fa-circle-o"></i> Register Sub-Category</a></li>
            <li><a href="brand"><i class="fa fa-circle-o"></i> Register Brand</a></li>
            <li><a href="manufacturer"><i class="fa fa-circle-o"></i> Register Manufacturers</a></li>
            <li><a href="bank"><i class="fa fa-circle-o"></i> Register Banks</a></li>
            <li><a href="BankAccount"><i class="fa fa-circle-o"></i> Register Bank Account</a></li>
          </ul>
        </li>
      </section>
      <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper" style="min-height: 916px;">
      <section class="content">
        @yield('content')
      </section>
    </div>

  </div>
  <!--modal for profile-->

  <div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id=""> {{ Auth::user()->name }} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label style="text-align: right" class=" col-sm-3 " for="">Use Name</label>
            <div style="padding: 0px" class="col-sm-8"> <input readonly="" id="" class="form-control  " placeholder="" value=" {{ Auth::user()->name }}  ">

            </div>
          </div>
          <div class="form-group row">
            <label style="text-align: right" class=" col-sm-3 " for="">Email</label>
            <div style="padding: 0px" class="col-sm-8"> <input readonly="" id="" class="form-control" placeholder="" value={{ Auth::user()->email }}>

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



  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong><a href="#">Alephtav consultancy</a>.</strong>
  </footer>s

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
 
</body>
  @stack('script')
</html>