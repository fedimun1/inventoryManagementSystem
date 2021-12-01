<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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


         return view('admin.Dashboard',compact('itemCount','shopItemCount','storeItemCount','LendAmount'));
     }

     
}
