<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
      <title>AlephTavcon</title>
  <link rel="icon" href='\assets\images\alephtav-logo1.jpg'/>
    <!-- Bootstrap core CSS -->
    
 
    <!-- Additional CSS Files


<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/css/templatemo-grad-school.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/css/lightbox.css')}}">
     -->
    
    <!--    
    use fore  datatable 
-->

   <link href="/assets/Vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/lightbox.css">
  <link rel="stylesheet" href="/assets/css/owl.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/templatemo-grad-school.css">
  <!--  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>-->


  </head>
@yield('css')
<body>
  <!--header-->
  <header class="main-header clearfix" role="header">
     <!--  Alephtav  logo-->
    <div  class="logo" style="display: inline-block;">
     <img class="" src="\assets\images\alephtav-logo.svg" alt="fedila" style="  padding-left: 400px; height: 60px;width: 60px; margin-left: 0px;padding-left: 0px"> 
   </div> 
   <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <!--  Alephtav  logo end -->  
      <!--  navigations  menu  -->  
  
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="/home">Home</a></li>
         <!--  check user authenticated   -->  
       @guest
        <li class="nav-item ">
            <a class="nav-link"  href="/login">
              {{ __('Login') }}
              <i class="icon-copy dw dw-login"></i>
            </a>

        </li>
             <!--  check user authenticated   -->  
@endguest
@auth
        <li class="has-submenu"><a href="">Tender Register</a>
          <ul class="sub-menu">
            <li><a href="/TenderRegister">RegisterTender</a></li>
          </ul>
        </li>
        <li class="has-submenu"><a href="">Tenders</a>
          <ul class="sub-menu">
            <li><a href="/tender">Tender List</a></li>
            <!--  <li><a href="#section3">Forcast</a></li>
             <li><a href="#section3">Archive</a></li>
            <li><a style="padding-left: 0px  !important" href="/document">Document Preview</a></li>-->
          </ul>
        </li>  
         @if(Auth::user()->role == "SystemAdmin"||Auth::user()->role == "tenderAdmin"||Auth::user()->role == "tenderchecker")
        <li class="has-submenu"><a href="">Cart List</a>
          <ul class="sub-menu">
            <li><a href="/AllCartList">Cart List</a></li>
            <!--  <li><a href="#section3">Forcast</a></li>
             <li><a href="#section3">Archive</a></li>
            <li><a style="padding-left: 0px  !important" href="/document">Document Preview</a></li>-->
          </ul>
        </li> 
           @endif
         <li class="has-submenu"><a href="#section2"> welcome  {{ Auth::user()->name }}</a>
          <ul class="sub-menu">
            <li> <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
             @if( Auth::user()->role == "SystemAdmin")
              <li><a href="/Adminhome" style="padding-left: 0px  !important"> {{ Auth::user()->name }} {{ __(' Dashboard') }}</a></li>
            @endif
            @if (auth()->user()->role == 'tenderAdmin'|| auth()->user()->role =='tenderEncoder'
              || auth()->user()->role == 'tenderchecker'||auth()->user()->role =='SubMaterExpert') 
              <li><a href="/UserPanel" style="padding-left: 0px  !important">  {{ Auth::user()->name }} {{ __(' Dashboard') }}</a></li>
            @endif
          @endauth
          </ul>
        </li>
         
      </ul>
    </nav>
     <!--  navigations  menu  end  --> 
  </header>

<div>
   @yield('content')
    
</div>
    <script src="/assets/Vendor/jquery/jquery.min.js"></script>
    <script src="/assets/Vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/isotope.min.js"></script>
    <script src="/assets/js/owl-carousel.js"></script>
    <script src="/assets/js/lightbox.js"></script>
    <script src="/assets/js/tabs.js"></script>
    <script src="/assets/js/video.js"></script>
    <script src="/assets/js/slick-slider.js"></script>
    <script src="/assets/js/custom.js"></script>













  @stack('script')
</body>
</html>