<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\DetailOrder;
use App\Models\transactionModel;
use App\Models\bank;
use App\Models\BankAccount;
//use DB;
use Response;
use App\Models\Items;
use Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Carbon;
class transaction extends Controller
{
    public function getTransForm()
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


      	return view('Inventory.transactionPage',compact('items','transaction','banks','bankAccount'));
    
    }
     public function creatNewTransaction(Request $req)
     {  
      
      
     //  dd($req); 
        DB::transaction( function () use($req)
        {
           $now = Carbon::now()->toDateTimeString();
            $data =Carbon::createFromFormat('Y-m-d H:i:s',$now, 'UTC')
           ->setTimezone('Africa/Addis_Ababa');
           $curentTime = $data ->toDateTimeString();

          $user_id=Auth::user()->id;
          $customers =new Customers;
          $customers->custName=$req->custName;
          $customers->custPhone=$req->custPhone;
          $customers->TinNumber=$req->TinNumber;
          $customers->save();
          $order_id= $customers->id; 

           $Transaction =new transactionModel;
          $tranrefNumber=Helper::IDGenerator(new transactionModel,'refNumber','5','CST');
          $Transaction->refNumber=$tranrefNumber;
          $Transaction->paidAmount=$req->paidAmount;
          $Transaction->PaymentMethod=$req->ModPay;
          $Transaction->doneBy=$user_id;
          $Transaction->Totaldiscount=$req->totadiscount;
          $Transaction->vatAmount=$req->vatAmout;
          $Transaction->transDate= $curentTime;
          $Transaction->custId=$order_id;
          $Transaction->save();
          $transaction_id= $Transaction->id; 

           for($product_id=0;$product_id<count($req->product_id);$product_id++)
           {
           
          $order_detail =new DetailOrder;
          $order_detail->quantity=$req->quantitysell[$product_id];
          $order_detail->unitPrice=$req->unitPrice[$product_id];
          $order_detail->amount=$req->totalAmount[$product_id];
          $order_detail->discount=$req->discount[$product_id];
          $order_detail->itemID=$req->product_id[$product_id];
          $order_detail->tranID=$transaction_id;
          $order_detail->save(); 

                   $Items =Items::where('id',$req->product_id[$product_id])->first();
                   $sellItem=$Items->itemInshop-$req->quantitysell[$product_id];
                   $Items->update([
                    'itemInshop'=>$sellItem,
                       
        ]);

           }
        });

 return redirect()->route('transaction')->with('success', 'Transaction  done  successfully');

     }

    //  public function gcoandqty(){

    //  	$itemCode = $_GET['id'];
    //     $json['status'] = 0;
        
      
        
    //     if($itemCode){
         
    //           $item_info = DB::table('items')->where('itemCode',$itemCode)->first();

    //         if($item_info){
    //             $json['availQty'] = (int)$item_info->itemQuantity;
    //             $json['unitPrice'] = $item_info->itemSellPrice;
    //             $json['status'] = 1;
    //         }
    //     }   
    //     return(json_encode($json));
    // }

    // public function creatNewTransaction()
    // {
  
    //         $itemCode = $_GET['id'];
    //   $data = $req->all();
    //   dd( $data);
    // //$itemCode = $_GET['data'];
    //   $user_id=Auth::user()->id;
    //   $ItemCode=Helper::IDGenerator(new Items,'itemCode','5','IMSC');
    //        DB::beginTransaction();
    //        try {
               
    //        } 
    //        catch (Exception $e) {
               
    //        }

    // }
}
