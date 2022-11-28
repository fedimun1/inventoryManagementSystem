@extends('admin.MasterLayout')
@section('css')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<script>

</script>
<!-- Create Item Button -->
<div class="col-md-3" style="background-image: linear-gradient(
45deg,#efefef 25%,rgba(239,239,239,0) 25%,rgba(239,239,239,0) 75%,#efefef 75%,#efefef),linear-gradient(
45deg,#efefef 25%,rgba(239,239,239,0) 25%,rgba(239,239,239,0) 75%,#efefef 75%,#efefef);
    background-color: #fff;
    background-position: 0 0,10px 10px"><h2 style="text-align: center;" >Mobile Banking </h2> </div>
<div class="col-sm-12">
    <br>
    <div class="row">
        <div class="col-sm-12">
            <!--- Item list div-->
            <div class="col-sm-12" id="itemsListDiv">
             <table id="shopTable" class="display" style="border-radius: 10px;color:black ;background-color: #6677ef; width: 100%">
             <thead>
              <tr>
                            <th>ref Number</th>
                            <th>item Name</th>
                            <th>Catagory </th>
                            <th>Quantity </th>
                            <th>Unit Price </th>
                            <th>Amount</th>
                            <th>Discount </th>
                            <th>Payment Mode</th>
                            <th>Customer</th>
                            <th>Transaction Date</th>

                            <th>Done By</th>

                        </tr>
                    </thead>
                        <tbody>
             @foreach($detailTransaction as $trans)
              <tr>
              <td >{{$trans->refNumber}}</td>
              <td>{{$trans->itemName}}</td>
              <td><p>{{$trans->itemCatName}}</p><p>{{$trans->itemSubCatName}}</p></td>
              <td>{{$trans->quantity}}</td>
              <td> {{$trans->unitPrice}}</td>
              <td >{{$trans->detailAmount}}</td>
              <td >{{$trans->discount}}</td>
              <td>
                    <p><span style="font-size:14px;font-style: italic;color: blue">Bank :</span> {{$trans->bankName}}</p>
                    <p><span style="font-size:14px;font-style: italic;color: blue">Acount Holder :</span> {{$trans->AcHolder}}</p>
                    <p><span style="font-size:14px;font-style: italic;color: blue">Account Number:</span> {{$trans->AccNumber}}</p>
                </td>
              <td><p>Name : {{$trans->custName}}</p><p>Phone : {{$trans->custPhone}}</p><p>TIN :  {{$trans->TinNumber}}</p></td>
              <td>{{$trans->created_at}}</td>
              <td>{{$trans->userName}}</td>

        @endforeach
              </tr>
        </tbody>

                </table>
            </div>
            <!--- End of item list div-->

        </div>
    </div>
</div>



@push('script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#shopTable').DataTable();
    });
</script>



@endpush
@endsection