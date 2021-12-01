<DOCTYPE html>
    <html>
        <head>
          <meta name="csrf-token" content="{{csrf_token() }}">
            <title>edit</title>
            <!-- to make style data table-->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
              <!-- Bootstrap Css -->
              <link rel="stylesheet" type="text/css" href="{{asset('Bootstrap_5/css/bootstrap.min.css')}}">
                <!-- J query -->
             

                 <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

                 <!-- data table js-->
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

               <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
                <script src="{{ asset('js/popper.min.js') }}" ></script>
               <script src="{{asset('Bootstrap_5/js/bootstrap.min.js')}}"></script>



              <link href="{{ asset('css/main.css') }}" rel="stylesheet">
              <link href="{{ asset('css/main2.css') }}" rel="stylesheet">  
              @yield('css')     
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

   <ul class="navbar-nav ml-auto nav justify-content-end">
    
   <li class="nav-item ">
    <a href="/">Tender Register</a>
    <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="/tender">Tenders</a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                      Tender Register
                                    </a>
                                     <a class="dropdown-item" href="/tender">
                                      Tender List
                                    </a>
                                </div>
                             -->
   
  </li>
   <li class="nav-item "><a href="/tender">Tender List</a></li>
    <li class="nav-item "><a href="/getTender">Task Assign</a></li>
    <li class="nav-item">   
                              <a class="nav-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                <!-- <li class="nav-item ">
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
                            </li>   -->
     
</ul>

</div>

 </div>
<div>
   @yield('content')
</div>

<script type="text/javascript">
  
$(document).ready( function () {
    $('#mytable').DataTable();
} );

</script>
@stack('')
</body>
</html>