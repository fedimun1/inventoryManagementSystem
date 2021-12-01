<?php

namespace App\Http\Controllers\IMS;
use App\Models\DetailOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  DB;
use Illuminate\Support\Carbon;
class report extends Controller
{
    public function getItemQuantity()
    {
       $itemNumber = DB::table('detailorder')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->sum("quantity");
       return view()
    }
}
