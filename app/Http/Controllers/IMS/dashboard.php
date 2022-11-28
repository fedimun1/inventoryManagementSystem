<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bought;
use App\Models\detailOrder;
use App\Models\Items;
use Auth;
use App\Helpers\Helper;
use DB;
use Illuminate\Support\Carbon;

class dashboard extends Controller
{
        public function getDashboard()
     {
      $LendAmount =bought::where('BoughtType','borrow')->sum('cashAmount');

         $shopItemCount =Items::where('itemInshop','>',0)->count();
          $storeItemCount =Items::where('itemInStore','>',0)->count();
          /// this is where and   $itemRecord = Items::where([['itemInStore','>',0],['itemInshop','>',0 ]])->count();
           $itemCount = DB::table('items')
            ->where('itemInStore','>',0)
            ->orWhere('itemInshop','>',0 )
            ->count();

      $itemNumber = DB::table('detailorder')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->sum("quantity");

     $totalEarnAmount = DB::table('totaltrans')->whereDate('transDate', '=', Carbon::today()->toDateString())->get()->sum("paidAmount");

       $totalEarnAmountCash = DB::table('totaltrans')->whereDate('transDate', '=', Carbon::today()->toDateString())
       ->where('PaymentMethod','Cash')->get()->sum("paidAmount");

     $totalEarnAmountCredit = DB::table('totaltrans')->whereDate('transDate', '=', Carbon::today()->toDateString())->where('PaymentMethod','Credit')->get()->sum("paidAmount");

        $totalEarnAmountMobileBanking = DB::table('totaltrans')->whereDate('transDate', '=', Carbon::today()->toDateString())->where('PaymentMethod','>',0)->get()->sum("paidAmount");

      //////////////////////High Earn//////////////////////////////////
    $HighEarn=DB::table('detailorder')->leftjoin('items','items.id','=','detailorder.itemID')
    ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())
    ->select(
      DB::raw('SUM(detailorder.amount) as amount'),
     'items.itemName as product_name',
      'items.id as product_id',
      'items.created_at as createdAt',
    )
   ->groupBy('items.id','items.itemName','items.created_at')
   ->orderBy('amount','DESC')
   ->take(5)
   ->get();

   $LowEarn=DB::table('detailorder')->leftjoin('items','items.id','=','detailorder.itemID')
    ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())
    ->select(
      DB::raw('SUM(detailorder.amount) as amount'),
     'items.itemName as product_name',
      'items.id as product_id',
      'items.created_at as createdAt',
    )
   ->groupBy('items.id','items.itemName','items.created_at')
   ->orderBy('amount','ASC')
   ->take(5)
   ->get();


   //////////////////////////////////////////////////////////////////

   $lowDemand=DB::table('detailorder')->leftjoin('items','items.id','=','detailorder.itemID')
    ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())
    ->select(
      DB::raw('SUM(detailorder.quantity) as QTY'),
     'items.itemName as product_name',
      'items.id as product_id',
      'items.created_at as createdAt',
    )
   ->groupBy('items.id','items.itemName','items.created_at')
   ->orderBy('QTY','ASC')
   ->take(5)
   ->get();
   //////////////////////////////////////////////////////////////////

   $highDemand=DB::table('detailorder')->leftjoin('items','items.id','=','detailorder.itemID')
    ->whereDate('detailorder.created_at', '=', Carbon::today()->toDateString())
    ->select(
      DB::raw('SUM(detailorder.quantity) as QTY'),
     'items.itemName as product_name',
      'items.id as product_id',
      'items.created_at as createdAt',
    )
   ->groupBy('items.id','items.itemName','items.created_at')
   ->orderBy('QTY','DESC')
   ->take(5)
   ->get();







         return view('admin.Dashboard',compact('itemCount','shopItemCount','storeItemCount','LendAmount','itemNumber','totalEarnAmount',
         'totalEarnAmountCash','totalEarnAmountCredit','totalEarnAmountMobileBanking',
         'HighEarn','LowEarn','lowDemand','highDemand'));
     }


}
