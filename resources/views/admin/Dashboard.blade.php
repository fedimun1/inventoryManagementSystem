@extends('admin.MasterLayout')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$itemCount}}</h3>
                <h4>Total Items in stoke</h4>
              
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="/Inventory" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$shopItemCount}}</h3>

              <h4>Items in Shop </h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="/Shop" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

     <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$storeItemCount}}</h3>

              <h4>Items in Store </h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="/Store" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <span>{{$LendAmount}}</span></h3>

              <p>Lend Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/LendPage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3></h3>

              <h4>Number of  Item sold</h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="getQuantity" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
 
       @push('script')
       <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
       <script>
         $(document).ready( function () {
    $('#myTable').DataTable();
} );

    $.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}
 $("span.numbers").digits();
       </script>
       @endpush


@endsection
