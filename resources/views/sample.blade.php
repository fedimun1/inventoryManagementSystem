<!DOCTYPE html>
<html>
   <head>
         <link href="{{ asset('css/main2.css') }}" rel="stylesheet">
             <link href="{{ asset('css/util.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title></title>
   </head>
   <body>

    
      <!-- Central Modal Medium Warning -->
      <div class="modal fade" id="ChartForChallenge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-notify modal-info modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">
               <!--Header-->
               <div class="modal-header">
                  <i class="fa fa-bars"></i>
                  <p class="heading lead">Pet Activity</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
               </div>
               <!--Body-->
               <div class="modal-body">
                  <div class="text-center">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs md-pills pills-default" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#Giorno" role="tab">Giorno</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#Settmana" role="tab">Settmana</a>
                        </li>
                     </ul>
                     <!-- Tab panels -->
                     <div class="main-content">
                        <p class="head">Ogg 10:47AM</p>
                        <div class="row">
                           <div class="col-6">
                              <img src="img/dashboard/walking-the-dog.svg" height="120px" width="120px">
                              <span class="title">Marco</span>
                           </div>
                           <div class="col-6">
                              <img src="img/dashboard/dog.svg" height="120px" width="120px">
                              <span class="title">Fiamma</span>
                           </div>
                        </div>
                     </div>
                     <div class="tab-content">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="Giorno" role="tabpanel">
                           <br>
                           <div id="petHealth" class="chart">
                              <svg style="min-height: 220px;"></svg>
                           </div>
                        </div>
                        <!--/.Panel 1-->
                        <!--Panel 3-->
                        <div class="tab-pane fade" id="Settmana" role="tabpanel">
                           <br>
                           <div id="petHealthDetails" class="chart">
                              <svg></svg>
                           </div>
                        </div>
                        <!--/.Panel 3-->
                     </div>
                  </div>
               </div>
               <!--Footer-->
               <div class="modal-footer justify-content-center">
                  <div class="col-6">
                     <span>8</span>
                     <p>Number passed</p>
                  </div>
                  <div class="col-6">
                     <span>18</span>
                     <p>Number passed</p>
                  </div>
               </div>
            </div>
            <!--/.Content-->
         </div>
      </div>
      <button style="margin:7px 15px 17px 0;" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ChartForChallenge">Click To Open Modal</button>
   </body>
</html>