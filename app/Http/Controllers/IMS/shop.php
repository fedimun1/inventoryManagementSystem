<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bought;
use DB;
use Response;
use App\Models\Items;
class shop extends Controller
{
    public function getItem()
    {
    	   $ItemList =Items::where('itemInshop','>',0)->get();
    	
           return view('inventory.shop',compact('ItemList'));

      
    }
      public function getLendItems()
    {
    	  
            $LendList = DB::table('items')
            ->join('bought', 'items.id', '=', 'bought.itemid')
            ->where([['boughtType','borrow'],['cashAmount','>',0 ]])->get();
           return view('inventory.LendPage',compact('LendList'));
    }
}
