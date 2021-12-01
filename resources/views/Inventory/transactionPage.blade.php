@extends('admin.MasterLayout')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<style>
    .card {
        background-color: #f5f5f5;
        padding: 5px;
        margin: 10px;
        border-radius: 5px;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        color: gray;
        margin-bottom: 10px;
        border-bottom: 1px solid black;
    }

    .buttons {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .separatorDiv {
        min-width: 10px;
    }

    .requiredStar {
        color: red
    }

    .paidAmount {
        font-weight: bold;
        font-size: larger;
        color: red;
    }
</style>


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
            <form method="post" action="creatTransaction" id="transactionForm">
                @csrf
                <!--- Item list div-->
                <div>
                    <div class="col-sm-12 card" id="itemsListDiv">
                        <div class="card-header">
                           Transaction
                        </div>
                        <table id="shopTable" class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Item Name<span class="requiredStar"> *</span></th>
                                    <th>Qty Inshop</th>
                                    <th>Quantity <span class="requiredStar"> *</span></th>
                                    <th>Unit Price</th>
                                    <th>Unit Discount</th>
                                    <th>Total Amount Per Unit</th>
                                    <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>

                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select name="product_id[]" id="product_id" row-number="1" class="form-control product_id">
                                            <option value="" disabled selected>Select your option</option>
                                            @foreach($items as $item)
                                            <option data-Qtyavalable="{{$item->itemInshop}}" data-price="{{$item->itemSellPrice}}" value="{{$item->id}}">

                                                {{$item->itemName}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" readonly="" name="quantityinshop[]" row-number="1" id="quantityinshop" class="quantityinshop form-control" required>
                                    </td>
                                    <td>
                                        <input type="number" name="quantitysell[]" row-number="1" id="quantitysell" class="quantitysell form-control" required>
                                    </td>
                                    <td>
                                        <input readonly type="number" name="unitPrice[]" row-number="1" id="unitPrice" class="unitPrice form-control" required>
                                    </td>
                                    <td>
                                        <input type="number" name="discount[]" row-number="1" id="discount" class="discount form-control" required>
                                    </td>
                                    </td>
                                    <td>
                                        <input type="number" name="totalAmount[]" row-number="1" id="totalAmount" class="totalAmount form-control">
                                    </td>
                                    <td>
                                      <!--   <a href="#" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card col-sm-12">
                        <div class="card-header">
                          Transaction
                        </div>
                        <div class="col-sm-4 form-group-sm">
                            <label for="totadiscount">Total Discount</label>
                            <input name="totadiscount" type="text" id="totadiscount" class="form-control" placeholder="Discount">
                        </div>


                        <div class="col-sm-4 form-group-sm">
                            <label for="vat">VAT<span class="requiredStar"> *</span></label>
                            <select name="vatAmout" class="form-control checkField" id="vat" required>
                                 <option value="0%">Zero Rated(0%)</option>
                                <option value="15%">Standard Rate(15%)</option>
                               
                            </select>
                        </div>

    
                        <div class="col-sm-4 form-group-sm">
                            <label for="modeOfPayment">Mode of Payment<span class="requiredStar"> *</span></label>
                            <select name="ModPay" class="form-control checkField" id="modeOfPayment" required>
                                <optgroup style="font-style: italic;font-size: 20px;color: blue"  label="Direct Payment">
                                <option value="Cash">Cash</option>
                                <option value="Credit">Credit</option>
                                </optgroup>
                               
                               <optgroup style="font-style: italic;font-size: 20px;color: red"  label="Mobile Banking">
                                    @foreach($banks as $bank)
                                    <optgroup label="{{$bank->name}}">
                                    @foreach($bankAccount as $bankAcc)
                                        @if($bank->id== $bankAcc->bankID)
                                        <option value="{{$bankAcc->id}}">{{$bankAcc->AcHolder}}</option>
                                    </optgroup>
                                    @endif
                                    @endforeach
                                    @endforeach
                            

                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-4 form-group-sm">
                            <label for="custName">Customer Name<span class="requiredStar"> *</span></label>
                            <input name="custName" type="text" id="custName" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="col-sm-4 form-group-sm">
                            <label for="custPhone">Customer Phone</label>
                            <input name="custPhone" type="tel" id="custPhone" class="form-control" placeholder="Phone Number">
                        </div>

                        <div class="col-sm-4 form-group-sm">
                            <label for="custEmail">Customer Tin</label>
                            <input name="TinNumber" type="number" id="custEmail" class="form-control" placeholder="Tin Number">
                        </div>
                    </div>
                    <div class="col-sm-12 form-group-sm buttons card">
                        <div class="card-header">
                            Transaction
                        </div>
                        <div class="col-sm-4">
                            <label for="paidAmount">Total Value</label>
                            <input readonly type="number" name="paidAmount" id="paidAmount" class="paidAmount form-control col-sm-4">
                        </div>
                    </div>
                    <!-- buttons -->
                    <div class="col-sm-12 form-group-sm buttons">
                        <button type="submit" class="btn btn-primary btn-sm" id="confirmSaleOrder">Confirm Order</button>
                        <button type="button" class="btn btn-danger btn-sm" id="cancelSaleOrder" onclick=resetTransactionForm()>Clear Order</button>
                        <!-- <button type="button" class="btn btn-danger btn-sm" id="hideTransForm">Close</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////Table Of Tran /////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                  
         <div class="col-sm-12" id="itemsListDiv">
                       <table id="transactionTable" class="display" style="border-radius: 10px;color:black ;background-color: #6677ef; width: 100%">
                    <thead>
                        <tr>
                            <th>Receipt No</th>
                            <th>Total Amount</th>
                            <th>Mode Of Payment</th>
                            <th>Done By</th>
                            <th>Customer</th>
                            <th>Recorded Date</th>
                            <th style="display: none;">Id</th>
                        </tr>
                    </thead>
                         <tbody>
             @foreach($transaction as $tran)
              <tr>
              <td >{{$tran->refNumber}}</td>
              <td>{{$tran->paidAmount}}</td>

              @if($tran->PaymentMethod == 'Cash')
              <td>cash</td>
              @elseif($tran->PaymentMethod == 'Credit')
              <td>credit</td>
              @else 
               <td><p style="font-size:14px;font-style: italic;color: blue">Mobile Banking</p>
                <p>Bank : {{$tran->bankName}}</p>
                <p>Acount Holder : {{$tran->AcHolder}}</p><p>Account Number: {{$tran->AccNumber}}</p></td>
              @endif
           
              <td> {{$tran->name}}</td>
              <td><p>Name : {{$tran->custName}}</p><p>Phone : {{$tran->custPhone}}</p><p>TIN :  {{$tran->TinNumber}}</p></td>
               <td >{{$tran->transDate}}</td>

              <td style="display: none;" >{{$item->id}}</td>
             

             

        @endforeach
              </tr> 
        </tbody>
                
              
                </table>
            </div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////End Of TRAN/////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-->
@push('script')

<script type="text/javascript">
0   
      var table = $('#transactionTable').DataTable({ "order": [[ 0, "desc" ]] } )

</script>
<script type="text/javascript">
    $(function() {
        let totalAmountValue = 0
        let quantitysellValue = 0
        let unitPriceValue = 0
        let rowNumberValue = 0
        let discountValue = 0
        var totalDiscountValue = 0

        //Product ID OnChange - Get data and display
        $('.addMoreProduct').delegate('.product_id', 'change', function(e) {
            //Find Table and Table elements
            var tr = $(this).parent().parent();

            //Find Table Values
            var price = tr.find('.product_id option:selected').attr('data-price');
            var avalableQuantity = tr.find('.product_id option:selected').attr('data-Qtyavalable');
            var quantity = tr.find('.quantitysell').val() - 0;
            var discount = tr.find('.discount').val() - 0;

            //Set Table Fields
            tr.find('.unitPrice').val(price);
            tr.find('.quantitysell').val();
            tr.find('.quantityinshop').val(avalableQuantity);
            tr.find('.discount').val(discount);

            //Calculate Total and Set total Field
            totalAmount = (quantity * price) - discount
            tr.find('.totalAmount').val(totalAmount);

            AddAndDisplayTotal(e)

            //Run at first
            $('.unitPrice').focusout(e => {
                AddAndDisplayTotal(e)
            });
            $('.discount').focusout(e => {
                AddAndDisplayTotal(e)
            });
            $('.quantitysell').focusout(e => {
                AddAndDisplayTotal(e)
            });

            //DisplayTotal
            displayAddedTotal()
        })

        function getTargetInputValue(e) {
            return e.target.value
        }

        function getTargetAttribute(e, attr) {
            return e.target.getAttribute(attr)
        }

        //Compute The fields and display them
        function AddAndDisplayTotal(e) {

            //find quantitysell by Row
            var quantitysellValueField = $('.quantitysell').filter(function() {
                return $(this).attr('row-number') == rowNumberValue;
            });

            quantitysell = quantitysellValueField.val() - 0


            //Find quantitysell By Row - When Changed
            if (e.target.className.includes('quantitysell')) {
                if (e.target.value) {
                    quantitysellValue = (e.target.value) - 0;
                    rowNumberValue = e.target.getAttribute('row-number')
                } else {
                    quantitysellValue = 0
                }
            }

            //find unitPrice by Row
            var unitPriceValueField = $('.unitPrice').filter(function() {
                return $(this).attr('row-number') == rowNumberValue;
            });

            unitPriceValue = unitPriceValueField.val() - 0

            //find unitPrice by Row - If It changes
            if (e.target.className.includes('unitPrice')) {
                if (e.target.value) {
                    unitPriceValue = getTargetInputValue(e);
                    rowNumberValue = getTargetAttribute(e, 'row-number')
                } else {
                    unitPriceValue = 0
                }
            }

            //find Discount by Row
            if (e.target.className.includes('discount')) {
                if (e.target.value) {
                    discountValue = (e.target.value) - 0;
                    rowNumberValue = e.target.getAttribute('row-number')
                } else {
                    discountValue = 0
                }
            }
            //Add quantitysell and unitPrice and Display it
            totalAmount = quantitysellValue * unitPriceValue

            var totalAmountField = $('.totalAmount').filter(function() {
                return $(this).attr('row-number') == rowNumberValue
            });

            totalAmountField.val((totalAmount - discountValue) - 0);

            //Display Total Amount
            displayAddedTotal()
        }

        $("#product_id")
            .change(function(e) {
                AddAndDisplayTotal(e)
            })
            .change();

        $("#totadiscount")
            .change(function(e) {
                AddAndDisplayTotal(e)
            })
            .change();

        $("#vat")
            .change(function(e) {
                AddAndDisplayTotal(e)
            })
            .change();

        //Display the total
        function displayAddedTotal() {
            //Finds paidAmount Value
            var sum = 0;

            $('.totalAmount').each(function() {
                sum += parseFloat(this.value);
            });
            if ($('#totadiscount').val()) {
                totalDiscountValue = $('#totadiscount').val() - 0;
            } else {
                totalDiscountValue = 0
            }

            //Vat
            if ($('#vat').val() === "15") {
                $('.paidAmount').val((sum - totalDiscountValue) + (sum - totalDiscountValue) * 0.15)
            } else {
                $('.paidAmount').val(sum - totalDiscountValue)
            }
        }

        //Reset Transaction form
        function resetTransactionForm() {
            form.reset()
            return false;
        };

        //Add More Rows to the table on click +
        $('.add_more').on('click', function(e) {
            var product = $('.product_id').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr =
                '<tr><td class="">' + numberofrow + '</td>' +
                '<td><select  row-number="' + numberofrow + '" class="form-control product_id" name="product_id[]">' + product + '</select</td>' +
                '<td><input type="number" readonly=""  name="quantityinshop[]" id="quantityinshop" row-number="' + numberofrow + '" class="quantityinshop form-control"></td>' +
                '<td><input type="number" name="quantitysell[]" id="quantitysell" row-number="' + numberofrow + '" class="quantitysell form-control"></td>' +
                '<td> <input type="number"  readonly name="unitPrice[]" id="unitPrice" row-number="' + numberofrow + '" class="unitPrice form-control"></td>' +
                '<td><input type="number" name="discount[]" id="discount" row-number="' + numberofrow + '" class="discount form-control"></td>' +
                '<td> <input type="number" name="totalAmount[]" id="totalAmount" row-number="' + numberofrow + '" class="totalAmount form-control"></td>' +
                '<td><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a></td>'

            $('.addMoreProduct').append(tr);

            document.querySelectorAll('.quantitysell').forEach(item => {
                item.addEventListener("focusout", e => {
                    AddAndDisplayTotal(e)
                });
            })

            document.querySelectorAll('.unitPrice').forEach(item => {
                item.addEventListener("focusout", e => {
                    AddAndDisplayTotal(e)
                });
            })

            document.querySelectorAll('.discount').forEach(item => {
                item.addEventListener("focusout", e => {
                    AddAndDisplayTotal(e)
                });
            })
        });

        //Add a delete Button
        $('.addMoreProduct').delegate('.delete', 'click', function(e) {
            $(this).parent().parent().remove();
            AddAndDisplayTotal(e)
        })
    });
</script>

@endpush
@endsection