@extends('admin.MasterLayout')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<script>

</script>
<!-- Create Item Button -->
<div class="col-sm-12">
    <br>
    <div class="row">
        <div class="col-sm-12">
            <!--Form to add/update an item-->
            <br>
            <!--- End of row to create new transaction-->
            <!---form to create new transactions--->

            <!--end of form-->

            <br><br>

            <!--- Item list div-->
            <div class="col-sm-12" id="itemsListDiv">
                       <table id="shopTable" class="display" style="border-radius: 10px;color:black ;background-color: #6677ef; width: 100%">
                    <thead>
                        <tr>
                            <th>ITEM CODE</th>
                            <th>ITEM NAME</th>
                            <th>DESCRIPTION </th>
                            <th>QTY IN Shop    </th>
                            <th>Unit Price(Buy)</th>
                            <th>Unit Price(Sell)</th>
                            <th>Recorded Date</th>
                            <th style="display: none;">Id</th>




                            <th>transfer to shop</th>

                        </tr>
                    </thead>
                         <tbody>
             @foreach($ItemList as $item)
              <tr>
              <td >{{$item->itemCode}}</td>
              <td>{{$item->itemName}}</td>
              <td>{{$item->itemDescription}}</td>
             <td class="<?=$item->itemInStore <= 10 ? 'bg-danger' : ($item->itemInStore <= 25 ? 'bg-warning' : '')?>">  {{$item->itemInshop}}</td>
              <td> {{$item->itemBuyPrice}}</td>
              <td >{{$item->itemSellPrice}}</td>
               <td >{{$item->created_at}}</td>

              <td style="display: none;" >{{$item->id}}</td>


             <td><button class="btn btn-primary view" data-toggle="modal" data-target="#TranferItem">Transer To Store</button></td>


        @endforeach
              </tr>
        </tbody>


                </table>
            </div>
            <!--- End of item list div-->

        </div>
    </div>
</div>
<div class="modal fade" id="TranferItem" tabindex="-1" role="dialog" aria-labelledby="TranferItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="transferToStore" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <label for="UpdateItemTitle">Tranfer List</label>
                    <button type="button" class="close cancelAddItem" data-dismiss="modal" aria-label="Close"> &times;
                    </button>
                </div>
                <div class="modal-body">
                    <label>code</label>
                    <input readonly name="itemCode" class="form-control itemCode" required="" id="itemCodeToTransfer" value="">
                </div>
                <div class="modal-body">
                    <label>Quantity</label>
                    <input name="itemquantity" type="number" min="0" class="form-control itemTransQty" required="">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Transfer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>



@push('script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#shopTable').DataTable();
    });
    $(document).ready(function() {
        var table = $('#shopTable').DataTable()
        $('#shopTable tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $('#itemCodeToTransfer').val(data[0])
            //assign data to form elements
        });
    });
</script>

<script type="text/javascript">
    $("#showTransForm").click(function() {
        $("#newTransDiv").toggleClass('collapse');

        if ($("#newTransDiv").hasClass('collapse')) {
            $(this).html("<i class='fa fa-plus'></i> New Transaction");
        } else {
            $(this).html("<i class='fa fa-minus'></i> New Transaction");

            //remove error messages
            $("#itemCodeNotFoundMsg").html("");
        }
    });
</script>
<script type="text/javascript">
    $("#cancelSaleOrder").click(function(e) {
        e.preventDefault();
        resetSalesTransForm();
    });
    $("#hideTransForm").click(function() {
        $("#newTransDiv").toggleClass('collapse');

        //remove error messages
        $("#itemCodeNotFoundMsg").html("");

        //change main "new transaction" button back to default
        $("#showTransForm").html("<i class='fa fa-plus'></i> New Transaction");
    });
</script>
@endpush
@endsection