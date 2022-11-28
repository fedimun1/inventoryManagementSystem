@extends('admin.MasterLayout')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="row">
<br>
    @include('FlashMessage.flashMessage')
<div class="col-sm-12" class="card"  style="background-color: rgb(215 216 231);border-radius:20px ">
    <form action="saveExpense" method="post">
      @csrf
 <div class="col-sm-6">
  <div class="form-group">
  <label for="resonoOfpayment">Reason/Purpose</label>
  <select id="paymentReason" name="paymentReason"  class="form-control" required>
   <option value=""   disabled selected>Please Select</option>
    <optgroup label="Meal">
    <option value="Breakfast">Breakfast</option>
    <option value="Lunch">Lunch </option>
    <option value="Diner"> Diner</option>
   </optgroup>
   <optgroup label="Loading Unloading">
    <option value="Loading">Loading</option>
    <option value="Unloading">Unloading </option>
    <option value="loadingUnloading"> Loadin UnLoading</option>
   </optgroup>
   <option id="" value="other">Other</option>
  </select>
  <div class="form-group" id="otherReason"style="display:none">
  <label for="">Reason</label>
  <input name="otherReasonType" type="text" id="" class="form-control"  placeholder="please enter the Reason" >
  </div>

  </div>
  <div class="form-group">
    <label for="labourName">payee </label>
    <input name="lbourName" type="text" class="form-control" id="labourName" placeholder="Enter Name Of labour" required>
  </div>
    </div>
    <div class="col-sm-6">
  <div class="form-group">
    <label for="amountPaid">Amount</label>
    <input required name="expenseAmount" type="text" class="form-control" id="amountPaid" placeholder="enter Amount Paid">
  </div>
  <div class="form-group">
    <label for="dateOfPayment">Paid Date </label>
    <input required name="paidDate" type="date" class="form-control" id="dateOfPayment" placeholder="">
  </div>
    </div>
    <div class="col-sm-6">
  <div class="form-group">
    <label for="paymentType">Payment Type</label>
    <select  required name="paymentType" id="" class="form-control">
      <option value="" disable selected>Please select type</option>
      <option value="Cash">Cash(on Hand)</option>
      <option value="Bank">Bank Transfer(include Cheque)</option>
    </select>
  </div>
    </div>
 <div class="col-sm-6">
  <div class="form-group">
    <label for="paymentType">Lbour Count</label>
   <input name="labourCount" type="number"  class="form-control" >
  </div>
    </div>

    <div class="col-sm-6">
  <div class="form-group">
    <label for="paymentType">Payer</label>
   <input name="payer" type="text"  class="form-control" placeholder="please insert payer name" require >
  </div>
    </div>
  <div class="row">
  <button style="float:right" class="btn btn-primary" type="submit" >Save </button>
  </div>
</div>
<div id="expense table" class="col-sm-12">
                <div class="col-sm-12" id="itemsListDiv">
                    <table id="expenseTable" class="display" style="border-radius: 10px;color:black ;background-color: #f5f5f5; width: 100%">
                        <thead>
                            <tr>
                                <th>Payment Reason</th>
                                <th>Payee</th>
                                <th>Labour Count </th>
                                <th>Payment Type</th>
                                <th>Paid Amount</th>
                                <th>Paid Date</th>
                                <th>Payer</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($expenseList as $expense)
                          <tr>
                          <td>{{$expense->paymentReason}}</td>
                          <td>{{$expense->lbourName}}</td>
                          <td>{{$expense->labourCount}}</td>
                          <td>{{$expense->paymentType}}</td>
                          <td>{{$expense->expenseAmount}}</td>
                          <td>{{$expense->paidDate}}</td>
                          <td>{{$expense->payer}}</td>

                          @endforeach
                          </tr>
                        </tbody>
                    </table>
                </div>

</form>
            </div>
            </div>
@push('script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
 $('#paymentReason').change(function(){
  var value = $(this).val();

  if(value=='other')
  {

    document.getElementById('otherReason').style.display = 'block';
  }
  else
  document.getElementById('otherReason').style.display = 'none';

});
var table = $('#expenseTable').DataTable()

</script>
@endpush
@endsection