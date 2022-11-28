<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Items;
use App\Models\itemCategory;
use App\Models\itemSubCategory;
use App\Models\Manufacture;
use App\Models\BankAccount;
use App\Models\bank;
use App\Models\Customers;
use DB;

class exchange extends Controller
{
   public function lend()
   {

    $banks=bank::all();
     $bankAccount=BankAccount::all();

  $items = DB::table('items')->where('itemInshop', '>=', 1)->orderBy('itemName', 'ASC')->get();
     $transaction = DB::table('totaltrans')
    ->select('totaltrans.*','users.*','customer.*','bankAccount.*','banks.name as bankName')
    ->leftjoin('customer', 'customer.id', '=', 'totaltrans.custId')
    ->leftjoin('users', 'users.id','=', 'totaltrans.doneBy')
    ->leftjoin('bankAccount', 'bankAccount.id','=', 'totaltrans.PaymentMethod')
    ->leftjoin('banks', 'banks.id','=', 'bankAccount.bankID')
      ->get();
      return view('Inventory.exchangelend',compact('items','transaction','banks','bankAccount'));

   }
   public function saveLendItem(Request $req)
   {
        dd($req);
   }
}
