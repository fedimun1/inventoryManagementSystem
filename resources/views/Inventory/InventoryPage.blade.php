@extends('admin.MasterLayout')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')

<style>
    .requiredStar {
        color: red
    }
</style>

<!-- Create Item Button -->
<div class="col-sm-12">
    <div class="col-sm-2 form-inline form-group-sm">
        <button onclick=SwitchAndClear(); class="btn btn-primary btn-sm" id="createItem">Add New Item</button>
    </div>
    <button id="test">clearrrrrr</button>
    <div class="col-sm-6 form-inline">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item ">
                <a class="toggle-vis-table btn btn-primary btn-sm" id="filterAll" stock-at="all">All Stock</a>
            </li>
            <li class="nav-item">
                <a class="toggle-vis-table btn btn-outline-secondary btn-sm" id="filterShop" stock-at="shop">In Shop</a>
            </li>
            <li class="nav-item">
                <a class="toggle-vis-table btn btn-outline-secondary btn-sm" id="filterStore" stock-at="store">In Store</a>
            </li>
        </ul>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-12">

            <!--Form to add/update an item-->
            <div class="col-sm-4" id='createNewItemDiv' style="display:none">
                <div class="well">
                    <button class="close cancelAddItem" onclick=SwitchAndClear()>&times;</button><br>
                    <form name="addNewItemForm" id="addNewItemForm" role="form" action="creatItem" method="post" novalidate>
                        @csrf
                        <div class="text-center errMsg" id='addCustErrMsg'></div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemName">Item Name<span class="requiredStar"> *</span></label>
                                <input type="text" id="itemName" name="itemName" placeholder="Item Name" maxlength="80" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemName">Brand Name<span class="requiredStar"> *</span></label>
                                <select name="brand" class="form-control" required="required">
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach($brand as $brand)
                                    <option value="{{$brand->id}}">{{$brand->BrandName}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemName">Manufacturer<span class="requiredStar"> *</span></label>
                                <select name="manufactur" class="form-control" required="required">
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach($manufacture as $man)
                                    <option value="{{$man->id}}">{{$man->ManufactureName}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="recept" class="">Recept<span class="requiredStar"> *</span></label>
                                <select name="recept" id="recept" class="form-control" required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option id="WithRecept" value="WithRecept">With Recept</option>
                                    <option id="WithoutRecept" value="WithoutRecept">Without Recept</option>
                                </select>
                            </div>
                        </div>
                        <div id="receptPayment">
                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="AmountOnRecept">Amount on Recept<span class="requiredStar"> *</span></label>
                                    <input type="text" id="amountOnRecept" name="amountOnRecept" placeholder="Amount On Recept" maxlength="80" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="AmountOnRecept">Amount Paid<span class="requiredStar"> *</span></label>
                                    <input type="text" id="amountPaid" name="amountPaid" placeholder="Amount Paid" maxlength="80" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- New new new new -->
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="store" class="">Place<span class="requiredStar"> *</span></label>
                                <select name="itemInStorein" id="itemInStorein" class="form-control" required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option id="StoreOption" value="Store">Store</option>
                                    <option id="ShopOption" value="Shop">Shop</option>
                                </select>
                            </div>
                        </div>
                        <!-- Quanitities .... To be toggled -->
                        <div>
                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="itemQuantity">Quantity<span class="requiredStar"> *</span></label>
                                    <input type="number" id="itemQuantity" name="" placeholder="" class="form-control" min="0">
                                </div>
                            </div>
                        </div>
                        <!-- Quanitities .... To be toggled -->

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="unitPrice">Unit Price(Buying)<span class="requiredStar"> *</span></label>
                                <input id="newItemUnitPrice" name="newItemUnitPrice" placeholder="Unit Price Buying" class="form-control">
                                <span class="help-block errMsg" id="itemPriceErr"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="unitPrice">Unit Price(Selling)<span class="requiredStar"> *</span></label>
                                <input name="itemSellPrice" placeholder="($)Unit Price for selling" class="form-control">
                                <span class="help-block errMsg" id="itemPriceErr"></span>
                            </div>
                        </div>
                        <!-- new new new new new - CATAGORY -->
                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="catagories" class="">Catagories<span class="requiredStar"> *</span></label>
                                <select name="category" class="form-control" required="required">
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach($itemCategory as $item)
                                    <optgroup label="{{$item->itemCatName}}">
                                        @foreach($itemSubCategory as $itemsub)
                                        @if($item->id== $itemsub->itemCatID)

                                        <option value="{{$itemsub->id}}">{{$itemsub->itemSubCatName}}</option>
                                    </optgroup>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </select>

                                <span class="help-block errMsg" id="catagoriesErr"></span>
                            </div>
                        </div>
                        <!-- new new new new new -->

                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itempurchase" class="">Bought By<span class="requiredStar"> *</span></label>
                                <select name="BoughtType" id="itempurchase" class="form-control" required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option id="cash" value="cash">Cash</option>
                                    <option id="Check" value="check">Check</option>
                                    <option id="borrow" value="borrow">Borrow</option>
                                </select>
                                <span class="help-block errMsg" id="itempurchaseErr"></span>
                            </div>
                        </div>
                        <!-- new new new new new Item Location-->

                        <!-- new new new new new -->
                        <br>
                        <div class="row" id="cashPayment" style="display: none;">
                            <div class="col-sm-12 form-group-sm">
                                <label for="Amount" class="">Cash Amount</label>
                                <input readonly type="number" id="cashAmount" name="cashAmount" placeholder="cash  Amount" class="form-control" min="0">
                                <span class="help-block errMsg" id="itemQuantityErr"></span>
                            </div>
                        </div>

                        <div id="checkPayment" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="ChequekType" class="">Cheque Type</label>
                                    <select name="chequeType" id="ChequeType" class="form-control">
                                        <option value="" disabled="selected">Check Type</option>
                                        <option value="cashCheque">Cash</option>
                                        <option value="creditCheque">Credit</option>
                                    </select>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="ChequeAmount" class="">Check Amount</label>
                                    <input readonly type="number" id="ChequeAmount" name="ChequeAmount" placeholder="Cheque  Amount" class="form-control" min="0">
                                    <span class="help-block errMsg" id="itemQuantityErr"></span>
                                </div>
                            </div>
                        </div>



                        <div id="borrowPayment" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="Lender" class="">Lender Name </label>
                                    <input type="" id="Lender" name="LenderName" placeholder="Lender Name" class="form-control">
                                    <span class="help-block errMsg" id="itemQuantityErr"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 form-group-sm">
                                    <label for="lendAmount" class="">Credit Amount</label>
                                    <input readonly type="number" id="lendAmount" name="lendAmount" placeholder="Credit   Amount" class="form-control">
                                    <span class="help-block errMsg" id="itemQuantityErr"></span>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12 form-group-sm">
                                <label for="itemDescription" class="">Description (Optional)</label>
                                <textarea class="form-control" id="itemDescription" name="itemDescription" rows='4' placeholder="Optional Item Description"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-sm-6 form-group-sm">
                                <button type="submit" class="btn btn-primary btn-sm" id="addNewItem">Add Item</button>
                            </div>
                            <!-- cancel button -->
                            <div class="col-sm-6 form-group-sm">
                                <button class="col-sm-6 btn btn-danger btn-sm" onclick=SwitchAndClear()>Cancel</button>
                            </div>

                        </div>
                    </form><!-- end of form-->
                </div>
            </div>

            <!--- Item list div-->
            <div>
                <div class="col-sm-12" id="itemsListDiv">
                    <table id="itemTable" class="display" style="border-radius: 10px;color:black ;background-color: #f5f5f5; width: 100%">
                        <thead>
                            <tr>
                                <th>ITEM CODE</th>
                                <th>ITEM NAME</th>
                                <th>DESCRIPTION </th>
                                <th>QTY IN Store</th>
                                <th>QTY IN Shop</th>
                                <th>Unit Price(Buy)</th>
                                <th>Unit Price(Sell)</th>
                                <th>Recorded Date</th>

                                <th style="display: none;">Id</th>
                                <th style="display: none;">BoughtType </th>
                                <th style="display: none;">Cash Amount </th>
                                <th style="display: none;">Check Type</th>
                                <th style="display: none;">Lender Name</th>

                                <!--
                            <th>Edit</th>
                            <th>Delete</th> -->
                                <th>Transfer</th>
                                <th>Transfer</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ItemList as $item)
                            <tr>
                                <td>{{$item->itemCode}}</td>
                                <td>{{$item->itemName}}</td>
                                <td>{{$item->itemDescription}}</td>
                                <td class="<?= $item->itemInStore <= 10 ? 'bg-danger' : ($item->itemInStore <= 25 ? 'bg-warning' : '') ?>"> {{$item->itemInStore}}</td>
                                <td class="<?= $item->itemInshop <= 10 ? 'bg-danger' : ($item->itemInshop <= 25 ? 'bg-warning' : '') ?>"> {{$item->itemInshop}}</td>
                                <td> {{$item->itemBuyPrice}}</td>
                                <td>{{$item->itemSellPrice}}</td>
                                <td>{{$item->created_at}}</td>

                                <td style="display: none;">{{$item->ItemId}}</td>
                                <td style="display: none;">{{$item->BoughtType}}</td>
                                <td style="display: none;">{{$item->cashAmount}}</td>
                                <td style="display: none;">{{$item->checkType}}</td>
                                <td style="display: none;"> {{$item->itemBuyPrice}}</td>

                                <!-- <td><a href="/View/{{$item->id}}/Detail" class="btn btn-primary view">Update</a></td>
             <td><a href="/update/{{$item->id}}/edit" class="btn btn-primary ">Delate</a></td> -->
                                <td><button id="rowButtonTransfer" class="btn btn-primary view" data-toggle="modal" data-target="#TranferItem">Transer To Shop</button></td>
                                <td><button id="rowButtonTransfer" class="btn btn-primary view" data-toggle="modal" data-target="#TranferItem">Transfer to Store</button></td>
                                @endforeach
                            </tr>
                        </tbody>
                        <!--
                    <tfoot>
                        <tr>
                            <th>ITEM CODE</th>
                            <th>ITEM NAME</th>
                            <th>DESCRIPTION </th>
                            <th>QTY IN Store</th>
                            <th>QTY IN Shop</th>
                            <th>Unit Price(Buy)</th>
                            <th>Unit Price(Sell)</th>
                            <th>Recorded Date</th>

                        </tr>
                    </tfoot> -->
                    </table>
                </div>
            </div>

            <!--- End of item list div-->


     <!--- Item list div-->
            <div id="shopDiv" style="display: none;">
                <div class="col-sm-12" id="itemsListDiv">
                    <table id="itemTable" class="display" style="border-radius: 10px;color:black ;background-color: #f5f5f5; width: 100%">
                        <thead>
                            <tr>
                                <th>ITEM CODE</th>
                                <th>ITEM NAME</th>
                                <th>DESCRIPTION </th>
                                <th>QTY IN Store</th>
                                <th>QTY IN Shop</th>
                                <th>Unit Price(Buy)</th>
                                <th>Unit Price(Sell)</th>
                                <th>Recorded Date</th>

                                <th style="display: none;">Id</th>
                                <th style="display: none;">BoughtType </th>
                                <th style="display: none;">Cash Amount </th>
                                <th style="display: none;">Check Type</th>
                                <th style="display: none;">Lender Name</th>

                                <!--
                            <th>Edit</th>
                            <th>Delete</th> -->
                                <th>Transfer</th>
                                <th>Transfer</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ItemList as $item)
                            <tr>
                                <td>{{$item->itemCode}}</td>
                                <td>{{$item->itemName}}</td>
                                <td>{{$item->itemDescription}}</td>
                                <td class="<?= $item->itemInStore <= 10 ? 'bg-danger' : ($item->itemInStore <= 25 ? 'bg-warning' : '') ?>"> {{$item->itemInshop}}</td>
                                <td class="<?= $item->itemInshop <= 10 ? 'bg-danger' : ($item->itemInshop <= 25 ? 'bg-warning' : '') ?>"> {{$item->itemInStore}}</td>
                                <td> {{$item->itemBuyPrice}}</td>
                                <td>{{$item->itemSellPrice}}</td>
                                <td>{{$item->created_at}}</td>

                                <td style="display: none;">{{$item->ItemId}}</td>
                                <td style="display: none;">{{$item->BoughtType}}</td>
                                <td style="display: none;">{{$item->cashAmount}}</td>
                                <td style="display: none;">{{$item->checkType}}</td>
                                <td style="display: none;"> {{$item->itemBuyPrice}}</td>

                                <!-- <td><a href="/View/{{$item->id}}/Detail" class="btn btn-primary view">Update</a></td>
             <td><a href="/update/{{$item->id}}/edit" class="btn btn-primary ">Delate</a></td> -->
                                <td><button id="rowButtonTransfer" class="btn btn-primary view" data-toggle="modal" data-target="#TranferItem">Transer To Shop</button></td>
                                <td><button id="rowButtonTransfer" class="btn btn-primary view" data-toggle="modal" data-target="#TranferItem">Transfer to Store</button></td>
                                @endforeach
                            </tr>
                        </tbody>
                        <!--
                    <tfoot>
                        <tr>
                            <th>ITEM CODE</th>
                            <th>ITEM NAME</th>
                            <th>DESCRIPTION </th>
                            <th>QTY IN Store</th>
                            <th>QTY IN Shop</th>
                            <th>Unit Price(Buy)</th>
                            <th>Unit Price(Sell)</th>
                            <th>Recorded Date</th>

                        </tr>
                    </tfoot> -->
                    </table>
                </div>
            </div>

            <!--- End of item list div-->























        </div>
    </div>


</div>
<div class="modal fade" id="TranferItem" tabindex="-1" role="dialog" aria-labelledby="TranferItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="transferToShop" method="post">
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
<!-- <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#itemTable').DataTable();
        //the filter functions
        $.fn.dataTable.ext.search.push(
            $("#filterStore").on("click", function(settings, searchData, index, rowData, counter) {
                console.log('clicked')
                if ([0].indexOf(searchData[4]) > 0) {
                    console.log('searched')
                    return true;
                } else {
                    console.log('else Running')
                    return false
                }
                table.draw();
            }))

        $.fn.dataTable.ext.search.push(
            function(settings, searchData, index, rowData, counter) {
                $("#filterAll").click(function() {
                    if (parseInt(searchData[3]) > 0) {
                        console.log(searchData[3])
                        return true;
                    } else {
                        return false
                    }
                    table.draw();
                })
            })
    })
</script> -->
<script type="text/javascript">
     //init dataTable
 // function loadDataTable()
 // {
 //   table = $("#itemTable").dataTable();
 // }

 // Reset dataTable
function resetFilter()
 {
    table = $("#itemTable").dataTable();
  // Clear table state
  table.state.clear();
  // Destroy table state
  table.destroy();
  // Reload dataTable without reload the page
//  loadDataTable();
 }

$("#test").click(function() {

  resetFilter();
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        //get table

        $('a.toggle-vis-table').on('click', function(e) {
            e.preventDefault();
            // Get the column API object
            var stockFromClick = table.column($(this).attr('stock-at'));

            var qtyinStore = table.column(['3'])
            var qtyinShop = table.column(['4'])
            var transferShopCol = table.column(['13'])
            var transferStoreCol = table.column(['14'])

            function hideShop() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var balance1 = parseInt(data[3]) || 0;
                        if (balance1 > 0) {
                            return true;
                        }
                        return false;
                    })
                qtyinStore.visible(true)
                qtyinShop.visible(false)
                transferShopCol.visible(true)
                transferStoreCol.visible(false)
            }

            //     function(settings, searchData, index, rowData, counter) {
            //         var toBeSearched.push(searchData[3])
            //         if (toBeSearched[0] > 0) {
            //             console.log(toBeSearched[0])
            //             if (toBeSearched.indexOf(searchData[3])) {
            //                 return false;
            //             } else {
            //                 console.log('Showing Row With: ' + (searchData[3]))
            //                 return true;
            //             }
            //         } else {
            //             return false;
            //         }
            //     }
            // );

            function hideStore() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var balance = parseInt(data[4]) || 0;
                        if (balance > 0) {
                            return true;
                        }
                        return false;
                    })

                qtyinStore.visible(false)
                qtyinShop.visible(true)
                transferShopCol.visible(false)
                transferStoreCol.visible(true)
            }

            function viewAll() {
                qtyinStore.visible(true)
                qtyinShop.visible(true)
                transferShopCol.visible(true)
                transferStoreCol.visible(true)
            }
            // Toggle the visibility
            if ($(this).attr('stock-at') === 'shop') {
              
           
                hideStore()
            }
            if ($(this).attr('stock-at') === 'store') {
                hideShop()
            }
            if ($(this).attr('stock-at') === 'all') {
                viewAll()
            }
        });
        var table = $('#itemTable').DataTable();
        $('a').on('click', function() {
            table.draw();
        });
    })
</script>
<script type="text/javascript">
    $(function() {
        $("#itempurchase").change(function() {

            if ($("#cash").is(":selected")) {
                $("#cashPayment").show();
                $("#checkPayment").hide();
                $("#borrowPayment").hide();
            } else if ($("#Check").is(":selected")) {
                $("#cashPayment").hide();
                $("#checkPayment").show();
                $("#borrowPayment").hide();
            } else if ($("#borrow").is(":selected")) {
                $("#cashPayment").hide();
                $("#checkPayment").hide();
                $("#borrowPayment").show();
            } else {
                $("#cashPayment").hide();
                $("#checkPayment").hide();
                $("#borrowPayment").hide();
            }
        }).trigger('change');
    });
    //Store/Shop Quantity Switch
    $(function() {
        $("#itemInStorein").change(function() {
            if ($("#StoreOption").is(":selected")) {
                $("#itemQuantity").attr({
                    name: 'itemstoreQuantity',
                    placeholder: 'Quantity Shipped to Store'
                });
            } else {
                $("#itemQuantity").attr({
                    name: 'itemshopQuantity',
                    placeholder: 'Quantity Shipped to Shop'
                });
            }
        }).trigger('change');
    });
    //Recept Payment switch
    $(function() {
        $("#recept").change(function() {
            if ($("#WithRecept").is(":selected")) {
                $("#receptPayment").show();
            } else {
                $("#receptPayment").hide();
            }
        }).trigger('change');
    });
</script>
<script type="text/javascript">
    //get rowId of a dataTable
    $(document).ready(function() {
        var table = $('#itemTable').DataTable()
        $('#itemTable tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $('#itemCodeToTransfer').val(data[0])
            //assign data to form elements
        });
    });


    //switcher
    function SwitchCreateNewItemDivVisibility() {

        if ($('#createNewItemDiv').is(":hidden")) {
            $('#createNewItemDiv').show();
            $('#itemsListDiv').attr('class', 'col-sm-8');
        } else {
            $('#createNewItemDiv').hide();
            $('#itemsListDiv').attr('class', 'col-sm-12');
        }
    }

    function resetForm(formId) {
        document.getElementById(formId).reset()
        return false;
    };

    function SwitchAndClear() {
        SwitchCreateNewItemDivVisibility()
        resetForm("addNewItemForm")
    };

    const form = document.getElementById('addNewItemForm');
    let amount;

    form.addEventListener('focusin', (event) => {
        //When focus
    });

    form.addEventListener('focusout', (event) => {
        amount = (parseInt($('#itemQuantity').val())) * (parseInt($('#newItemUnitPrice').val()));
        $("#cashAmount, #ChequeAmount, #lendAmount").val(amount);
    });
</script>

@endpush

@endsection




<!-- <script>
    $(document).ready(function() {
        $('#itemTable').DataTable();
    });
</script>
<script type="text/javascript">
    $(function() {
        $("#itempurchase").change(function() {

            if ($("#cash").is(":selected")) {
                $("#cashPayment").show();
                $("#checkPayment").hide();
                $("#borrowPayment").hide();
            } else if ($("#Check").is(":selected")) {
                $("#cashPayment").hide();
                $("#checkPayment").show();
                $("#borrowPayment").hide();
            } else if ($("#borrow").is(":selected")) {
                $("#cashPayment").hide();
                $("#checkPayment").hide();
                $("#borrowPayment").show();
            } else {
                $("#cashPayment").hide();
                $("#checkPayment").hide();
                $("#borrowPayment").hide();
            }
        }).trigger('change');
    });
    //Store/Shop Quantity Switch
    $(function() {
        $("#itemInStorein").change(function() {
            if ($("#StoreOption").is(":selected")) {
                $("#itemQuantity").attr({
                    name: 'itemstoreQuantity',
                    placeholder: 'Quantity Shipped to Store'
                });
            } else {
                $("#itemQuantity").attr({
                    name: 'itemshopQuantity',
                    placeholder: 'Quantity Shipped to Shop'
                });
            }
        }).trigger('change');
    });
    //Recept Payment switch
    $(function() {
        $("#recept").change(function() {
            if ($("#WithRecept").is(":selected")) {
                $("#receptPayment").show();
            } else {
                $("#receptPayment").hide();
            }
        }).trigger('change');
    });
</script>
<script type="text/javascript">
    //get rowId of a dataTable
    $(document).ready(function() {
        var table = $('#itemTable').DataTable()
        $('#itemTable tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $('#itemCodeToTransfer').val(data[0])
            //assign data to form elements
        });
    });


    //switcher
    function SwitchCreateNewItemDivVisibility() {

        if ($('#createNewItemDiv').is(":hidden")) {
            $('#createNewItemDiv').show();
            $('#itemsListDiv').attr('class', 'col-sm-8');
        } else {
            $('#createNewItemDiv').hide();
            $('#itemsListDiv').attr('class', 'col-sm-12');
        }
    }

    function resetForm(formId) {
        document.getElementById(formId).reset()
        return false;
    };

    function SwitchAndClear() {
        SwitchCreateNewItemDivVisibility()
        resetForm("addNewItemForm")
    };

    const form = document.getElementById('addNewItemForm');
    let amount;

    form.addEventListener('focusin', (event) => {
        //When focus
    });

    form.addEventListener('focusout', (event) => {
        amount = (parseInt($('#itemQuantity').val())) * (parseInt($('#newItemUnitPrice').val()));
        $("#cashAmount, #ChequeAmount, #lendAmount").val(amount);
    });
</script> -->