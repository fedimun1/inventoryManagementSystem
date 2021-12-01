<!--  <link rel="stylesheet" href="assets/css/templatemo-grad-school.css"> -->
@extends('header') 
@section('content')
 <!-- ***** Main Banner Area  in this area the loop vidio is display ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
                  <source src="assets/images/com-animation.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
              <h6>Tender  Management</h6>
              <h2><em>Aleph</em> Tav</h2>
              <div class="main-button">
                  <div class=""><a href="">new thinking new solution </a></div>
              </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
   <!-- ***** section area that used to display  the number of tender or counting     ***** -->
  <section class="features">
    <div class="container">
      <div class="row">
         <!-- ***** Main Area That used to count post tender  ***** -->
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-pencil"></i>'New Thinking, New Solution!'</h4>
              </div>
              <div class="content-hide">
            
               <!--<div class="scroll-to-section"><a href="/Posttender">More Info.</a></div>-->
            </div>
            </div>
          </div>
        </div>
          <!-- ***** end of post tender count   area ***** -->
               <!-- ***** Main Area That used to count Forcast  tender  ***** -->
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-graduation-cap"></i>'New Thinking, New Solution!'</h4>
              </div>
              <div class="content-hide">
      
         <!--<div class="scroll-to-section"><a href="/Posttender">More Info.</a></div>-->
            </div>
            </div>
          </div>
        </div>
               <!-- ***** end of Forcast  tender count  area ***** -->
             <!-- ***** Main Area That used to count Archive  tender  ***** -->    
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-book"></i>'New Thinking, New Solution!'</h4>
              </div>
              <div class="content-hide">
          
               <!--<div class="scroll-to-section"><a href="/Posttender">More Info.</a></div>-->
            </div>
            </div>
          </div>
        </div>
       <!-- ***** end of Archive tender count   area ***** -->
      </div>
    </div>
  </section>
   <!-- ***** Main end of section   ***** -->
@endsection
