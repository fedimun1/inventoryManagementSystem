<?php

namespace App\Http\Controllers\IMS;
use App\Models\DetailOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  DB;
use Illuminate\Support\Carbon;
class report extends Controller
{
    public function GetTransactionDetail()
    {


          $detailTransaction = DB::table('detailorder')
       ->leftJoin('items', 'detailorder.itemID', '=', 'items.id')
       ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())->get();

       return view('Inventory.Report.Transaction',compact('detailTransaction'));
    }

    public function getCashSales()
    {
       $detailTransaction = DB::table('detailorder')
     ->leftJoin('items', 'detailorder.itemID', '=', 'items.id')
    ->leftJoin('totaltrans', 'detailorder.tranID', '=', 'totaltrans.id')
    ->leftjoin('itemsubcategory', 'itemsubcategory.id','=', 'items.categoryID')
    ->leftjoin('itemcategory','itemcategory.id','=', 'itemsubcategory.itemCatID')
    ->leftjoin('users','users.id','=', 'totaltrans.doneBy')
    ->leftjoin('customer', 'customer.id', '=', 'totaltrans.custId')
    ->where('totaltrans.PaymentMethod','Cash')
       ->get();
       // ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())->get();
       return view('Inventory.Report.cashSales',compact('detailTransaction'));
    }
   public function getCreditSales()
   {
      $detailTransaction = DB::table('detailorder')
      ->leftJoin('items', 'detailorder.itemID', '=', 'items.id')
     ->leftJoin('totaltrans', 'detailorder.tranID', '=', 'totaltrans.id')
     ->leftjoin('itemsubcategory', 'itemsubcategory.id','=', 'items.categoryID')
     ->leftjoin('itemcategory','itemcategory.id','=', 'itemsubcategory.itemCatID')
     ->leftjoin('users','users.id','=', 'totaltrans.doneBy')
     ->leftjoin('customer', 'customer.id', '=', 'totaltrans.custId')
     ->where('totaltrans.PaymentMethod','Credit')
        ->get();
        // ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())->get();
        return view('Inventory.Report.creditSales',compact('detailTransaction'));
   }

      public function getMobileBankingSales()
   {
      $detailTransaction = DB::table('detailorder')
      ->select('items.itemName','totaltrans.refNumber','itemcategory.itemCatName',
      'itemsubcategory.itemSubCatName','detailorder.quantity','detailorder.unitPrice',
      'detailorder.amount as detailAmount','detailorder.created_at',
      'detailorder.unitPrice','detailorder.discount','customer.custName','customer.custPhone','customer.TinNumber',
      'users.name as userName','bankAccount.AcHolder','bankAccount.AccNumber','banks.name as bankName')
      ->leftJoin('items', 'detailorder.itemID', '=', 'items.id')
     ->leftJoin('totaltrans', 'detailorder.tranID', '=', 'totaltrans.id')
     ->leftjoin('itemsubcategory', 'itemsubcategory.id','=', 'items.categoryID')
     ->leftjoin('itemcategory','itemcategory.id','=', 'itemsubcategory.itemCatID')
     ->leftjoin('users','users.id','=', 'totaltrans.doneBy')
     ->leftjoin('customer', 'customer.id', '=', 'totaltrans.custId')
     ->leftjoin('bankAccount', 'bankAccount.id','=', 'totaltrans.PaymentMethod')
    ->leftjoin('banks', 'banks.id','=', 'bankAccount.bankID')
     ->where('totaltrans.PaymentMethod','>',0)
        ->get();

        // ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())->get();
        return view('Inventory.Report.mobileBanking',compact('detailTransaction'));
   }
   public function getCashPurchase()
   {
      $cashItem=DB::table('items')
      ->leftjoin('bought','items.id','bought.ItemId')
      ->where('bought.BoughtType','cash')
      ->get();
      return   view('Inventory.Report.CashPurchase',compact('cashItem'));
   }
   public function getCreditPurchase()
   {
      dd('purchase by credit');

   }

   public function getLoanPurchase()
   {
      dd('Loan purchase');
   }


}
