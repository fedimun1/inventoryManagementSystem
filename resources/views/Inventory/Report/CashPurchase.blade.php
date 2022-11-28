@extends('admin.MasterLayout')
@section('css')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<script>

</script>
<!-- Create Item Button -->
<div style="box-shadow: rgb(195 38 38) 0px 5px 15px; height:50px"><h2 >Purchase Item By Cash </h2> </div>
<div class="col-sm-12">
    <br>
    <div class="row">
        <div class="col-sm-12">
            <!--- Item list div-->
            <div class="col-sm-12" id="itemsListDiv">
             <table id="shopTable" class="display" style="border-radius: 10px;color:black ;background-color: #6677ef; width: 100%">
             <thead>
              <tr>
                            <th>Item Code</th>
                            <th>item Name</th>
                            <th>Item Buy Price </th>
                            <th>Item Sell Price </th>
                            <th>Description </th>
                            <th>Item In Shop</th>
                            <th>Item IN Store </th>
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
              <td >{{$trans->amount}}</td>
              <td >{{$trans->discount}}</td>
              <td><p>Name : {{$trans->custName}}</p><p>Phone : {{$trans->custPhone}}</p><p>TIN :  {{$trans->TinNumber}}</p></td>
              <td>{{$trans->created_at}}</td>
              <td>{{$trans->name}}</td>

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