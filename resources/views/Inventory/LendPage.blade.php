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
     @include('FlashMessage.flashMessage')
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
                            <th>Amount </th>
                            <th>Type Payment</th>
                            <th>reciept Amount</th>
                            <th>Actual Pay</th>
                            <th>Recorded Date</th>
                            <th style="display: none;">Id</th>
                            
                            

                      
                            <th></th>

                        </tr>
                    </thead>
                         <tbody>
             @foreach($LendList as $item)
              <tr>
              <td >{{$item->itemCode}}</td>
              <td>{{$item->itemName}}</td>
              <td>{{$item->cashAmount}}</td>
              <td> {{$item->ReciptType}}</td>
              <td >{{$item->amountOnRect}}</td>
              <td >{{$item->actualValue}}</td>
               <td >{{$item->created_at}}</td>

              <td style="display: none;" >{{$item->ItemId}}</td>
             

             <td><button class="btn btn-primary view" data-toggle="modal" data-target="#TranferItem">Pay</button></td>
             

        @endforeach
              </tr> 
        </tbody>
                
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!--- End of item list div-->

        </div>
    </div>
</div>
      <div class="modal fade" id="TranferItem" tabindex="-1" role="dialog" aria-labelledby="TranferItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="payCredit" method="post" >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <label for="UpdateItemTitle">Payment Form</label>
                    <button type="button" class="close cancelAddItem" data-dismiss="modal" aria-label="Close"> &times;
                    </button>
                </div>
                <div class="modal-body">
                    <label>code</label>
                    <input readonly name="itemCode" class="form-control itemCode" required="" id="itemCodeToTransfer" value="">
                    <input style="display: none;"  name="itemID" class="form-control itemCode"  id="itemID" value="">
                </div>
                <div class="modal-body">
                    <label>Amount</label>
                    <input name="cashAmountValue" type="number" min="0" class="form-control " required="">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pay</button>
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
        //get rowId of a dataTable
    $(document).ready(function() {
        var table = $('#shopTable').DataTable()
        $('#shopTable tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $('#itemCodeToTransfer').val(data[0])
             $('#itemID').val(data[7])
            //assign data to form elements
        });
    });
</script>


@endpush
@endsection