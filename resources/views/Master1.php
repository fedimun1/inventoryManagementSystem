<DOCTYPE html>
    <html>
        <head>
          <meta name="csrf-token" content="{{csrf_token() }}">
            <title>edit</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
  <!-- CSS -->
  <link href="../css/app.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">


  <!-- Styles -->  
  <script src="../js/app.js" defer></script>
  <script src="{{ asset('vendors/scripts/jQuery v3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendors/scripts/core.js') }}"></script>
  <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
  <script src="{{ asset('vendors/scripts/process.js') }}"></script>
  <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
  <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>


  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('src/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('src/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('src/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('src/styles/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('src/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('src/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('src/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
  
            
             <link href="{{ asset('css/main.css') }}" rel="stylesheet">
              <link href="{{ asset('css/main2.css') }}" rel="stylesheet">
</head>
<body>       
	<div class="container">
		<div class="  navbar navbar-expand-lg navbar-light    rounded-pill" style="  border: none;background-color: #85C7F9; margin-top: 50px;  margin-left: 0px;   height: 70px">
    <div style="width: 70px;
      height: 70px;
            border: none;
      background: white;
      border-radius: 50%">
<img class="rounded-circle" src="images\Alephtav.jpg" alt="fedila" style="  padding-left: 0px; height: 70px;width: 70PX; margin-left: 0px;padding-left: 0px"></div>
<div style="margin-left : 10px; width:200px"><h5 style="font-family:Cursive">Alephtav  consultancy</h5>
</div>

   <ul class="navbar-nav ml-auto">
    
   <li class="nav-item ">
    <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="/tender">Tenders</a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                      Tender Register
                                    </a>
                                     <a class="dropdown-item" href="/tender">
                                      Tender List
                                    </a>
                                </div>
                             
  </li>
    <li class="nav-item "><a href="/getTender">Task Assign</a></li>
      <li class="nav-item ">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
                                </a>
 

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>   
</ul>

</div>

 </div>
<div>
   @yield('content')
</div>
 
  <!-- Vendor JS Files -->
  {{-- <script src="{{ asset('land/assets/vendor/jquery/jquery.min.js') }}"></script> 
  <script src="{{ asset('land/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('land/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('land/assets/vendor/php-email-form/validate.js') }}"></script>--}}
  <script src="{{ asset('land/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('land/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('land/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('land/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('land/assets/js/main.js') }}"></script>
</body>
</html>