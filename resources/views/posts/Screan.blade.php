@extends('header')
@section('content')
<style type="text/css">
body{
	color: black;
}
span{
  margin-left: 30px;
}
.card-header {
    padding: 1.5rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid #001959;
}
input[type=checkbox] {
    cursor: pointer;
    font-size: 17px;
    visibility: hidden;
    position: absolute;
    top: 0;
    left: 0;
    transform: scale(1.5);
}

input[type=checkbox]:after {
    content: " ";
    background-color: #fff;
    display: inline-block;
    color: #00BFF0;
    width: 25px;
    height: 25px;
    visibility: visible;
    border: 1px solid black;
    padding: 0 3px;
    margin: 2px 0;
    border-radius: 8px;
    box-shadow: 0 0 15px 0 rgba(0,0,0,0.08), 0 0 2px 0 rgba(0,0,0,0.16);
}

input[type=checkbox]:checked:after {
    content: "\2714";
    display: unset;
    font-weight: bold;
}
</style>
<div style="margin-left: 10%;margin-right:10%">
<div class="card" style="margin-top: 60px;border: 5px solid #001959 !important;">
	  @include('FlashMessage.flashMessage')
  <h5 class="card-header">Criterias</h5>
  <div class="card-body">
  <form  style="padding-left:100px"  action="Screen" method="post">
  	    @csrf
   <div  class="form-group row">
  	<div  class="col-sm-3">
  <label  class="me col-form-label" style="float: right;">Area Of Work/Provision
 <div class="con"> <span> please TIK the Area</span>
</div>
  </label>
  </div>
    <div class="col-sm-2"> 
 <input value="0.5" name="Service" type="checkbox"> <span>Service </span>
</div>
 <div class="col-sm-2"> 
 <input type="checkbox" value="1" name="Material"> <span>Material </span>
</div>
 <div class="col-sm-2"> 
 <input type="checkbox" value="0.5" name="Consultancy"> <span>Consultancy </span>
</div>
  </div>
  <br>
    <!--##########################################3333333333-->

  <div  class="form-group row">
<div  class="col-sm-3">
<label  class="me col-form-label" style="float: right;">Licence List/Portfolio
 <div class="con"> <span>list of licence that we have</span>
</div>
    </label>
  	</div>
    <div class="col-sm-4" style="padding-left: 0;">
         <select name="area_work" class="form-control"  >
      @foreach($portfolioList as $portfolio)
      <option value="">{{$portfolio->PortfolioName}} </option>
     @endforeach
  </select>
    </div>
 <div class="col-sm-2"> 
 <input type="checkbox" name="licence" value="1"> <span>Eligible </span>
</div>
  </div>
   <br>


  <!--##########################################3333333333-->

  <div  class="form-group row">
<div  class="col-sm-3">
<label  class="me col-form-label" style="float: right;">Area Of Work
 <div class="con"> <span> area of work that we work</span>
</div>
    </label>
  	</div>
    <div class="col-sm-4" style="padding-left: 0;">
       <select name="area_work" class="form-control" >
      @foreach($workArea as $workArea)
      <option value="">{{$workArea->areaName}} </option>
     @endforeach
  </select>
    </div>
 <div class="col-sm-2"> 
 <input type="checkbox" name="area" value="1"> <span>Eligible </span>
</div>
  </div>
   <br>
  <br>
  <!--##########################################3333333333-->


  	  <div  class="form-group row">
  	<div  class="col-sm-3">
  <label  class="me col-form-label" style="float: right;">BID Security Amount
 <div class="con"> <span> please tik if not Exaggerated</span>
</div>
  </label>
  </div>
 <div class="col-sm-2"> 
 <input type="checkbox" name="amount" value="1"> <span>Not Exaggerated </span>
</div>
  </div>
  <br>
  <br>
  <!--##########################################3333333333-->
    <div  class="form-group row">
  	<div  class=" col-sm-3">
  <label  class="me col-form-label" style="float: right;">Period of
 <div class="con"> <span>Tik If the Time Is Eough</span>
</div>
  </label>
  </div>
 <div class="col-sm-2"> 
 <input value="1" name="time" type="checkbox"> <span>Enough Time </span>
</div>
  </div>
  <br>
  <br>
    <div style="padding-left: 850px;padding-top:20px"><button type="submit" class="btn btn-primary btn-lg">Continue</button>
</div>
  	</form>
</div>
</div>
</div>
@endsection