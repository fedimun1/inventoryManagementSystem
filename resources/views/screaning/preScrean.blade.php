@extends('header')
@section('content')
<div style="margin-left: 10%;margin-right:10%">
<div class="card" style="margin-top: 60px;border: 5px solid #001959 !important;">
	  @include('FlashMessage.flashMessage')
  <h5 class="card-header">screening Criteria</h5>
  <div class="card-body">
  <form  style="padding-left:100px"  action="Screen" method="post">
  	    @csrf

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
  </div>
   <br>
  <!--##########################################3333333333-->
    <div style="padding-left: 850px;padding-top:20px"><button type="submit" class="btn btn-primary btn-lg">Continue</button>
</div>
  	</form>
</div>
</div>
</div>
@endsection