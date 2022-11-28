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
                <span>{{$LendAmount}} birr</span></h3>

              <p>Total Lend Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/LendPage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div>
     Day Activity
   <hr style=" border-top: 1px solid red;">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$itemNumber}}</h3>

              <h4>Number of Items Sold Today</h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="GetTransactionDetail" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$totalEarnAmount}} birr</h3>

              <h4>Amount Total  Earn Today</h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="GetTransactionDetail" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$totalEarnAmountCash}} birr</h3>

              <h4>Amount of Earn by cash Today</h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="GetTransactionDetail" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$totalEarnAmountCredit}} birr</h3>

              <h4>Amount Total  Earn by credit  Today</h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="GetTransactionDetail" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$totalEarnAmountMobileBanking}} birr</h3>

              <h4>Amount Total  Earn by Mobile Banking  Today</h4>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="GetTransactionDetail" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-sm-12">
        <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-level-up"></i> HIGH IN Earn</div>
                        <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>amount</th>
                        <!-- <th>amount</th> -->
                    </tr>
                </thead>
                 <tbody>
                   <tr>
                     @foreach($HighEarn as $highearn)
                     <td>{{$highearn->product_name}}</td>
                     <td>{{$highearn->amount}}</td>
                     <!-- <td>{{$highearn->createdAt}}</td> -->


                   </tr>
                   @endforeach
                 </tbody>
</table>
                    </div>
    </div>

<!-- //////////////////////////////////////////////////////////// -->
<div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-level-up"></i> Low IN Earn</div>
                        <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>amount</th>
                        <!-- <th>amount</th> -->
                    </tr>
                </thead>
                 <tbody>
                   <tr>
                     @foreach($LowEarn as $LowEarn)
                     <td>{{$LowEarn->product_name}}</td>
                     <td>{{$LowEarn->amount}}</td>
                     <!-- <td>{{$highearn->createdAt}}</td> -->


                   </tr>
                   @endforeach
                 </tbody>
</table>
                    </div>
    </div>


<!-- //////////////////////////////////////////////////////////// -->
<div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-level-up"></i> High Demand</div>
                        <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <!-- <th>amount</th> -->
                    </tr>
                </thead>
                 <tbody>
                   <tr>
                     @foreach($highDemand as $highDemand)
                     <td>{{$highDemand->product_name}}</td>
                     <td>{{$highDemand->QTY}}</td>
                     <!-- <td>{{$highearn->createdAt}}</td> -->


                   </tr>
                   @endforeach
                 </tbody>
</table>
                    </div>
    </div>


<!-- //////////////////////////////////////////////////////////// -->
<div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-level-up"></i> Low Demand</div>
                        <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <!-- <th>amount</th> -->
                    </tr>
                </thead>
                 <tbody>
                   <tr>
                     @foreach($lowDemand as $lowDemand)
                     <td>{{$lowDemand->product_name}}</td>
                     <td>{{$lowDemand->QTY}}</td>
                     <!-- <td>{{$highearn->createdAt}}</td> -->


                   </tr>
                   @endforeach
                 </tbody>
</table>
                    </div>
    </div>

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
