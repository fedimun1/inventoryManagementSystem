<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bought;
use App\Models\Items;


use App\Models\Brand;
use App\Models\itemCategory;
use App\Models\itemSubCategory;
use App\Models\Manufacture;

use Auth;
use App\Helpers\Helper;
use DB;
use Response;
class inventory extends Controller
{


     public function creatInventory()
    {
       $brand=Brand::all();
       $itemCategory=itemCategory::all();
       $itemSubCategory=itemSubCategory::all();
        $manufacture=Manufacture::all();

        $ItemList = DB::table('items')
       ->leftJoin('bought', 'bought.ItemId', '=', 'items.id')->get();


        return view('Inventory.InventoryPage',compact('ItemList','brand','itemCategory','itemSubCategory','manufacture'));
    }

    public function creratItem(Request $req)
    {


          	$user_id=Auth::user()->id;

      $ItemCode=Helper::IDGenerator(new Items,'itemCode','5','IMSC');

           DB::beginTransaction();
           try {
            if($req->itemInStorein=='Store')
            {
               $storQuantity=$req->itemstoreQuantity;
               $shopQuantity=0;
            }
            else
            {
               $storQuantity=0;
               $shopQuantity=$req->itemshopQuantity;
            }
        $inventory =Items::create([
        'itemCode'=>$ItemCode,
        'itemName'=>$req->itemName,
        'brandID'=>$req->brand,
        'ManufactureID'=>$req->manufactur,
        'categoryID'=>$req->category,
        'ReciptType'=>$req->recept,
        'amountOnRect'=>$req->amountOnRecept,
        'actualValue'=>$req->amountPaid,
        'itemInStore'=>$storQuantity,
        'itemInshop'=>$shopQuantity,
        'itemBuyPrice'=>$req->newItemUnitPrice,
        'itemSellPrice'=>$req->itemSellPrice,
        'itemDescription'=>$req->itemDescription,
        'reg_by'=>$user_id,
       ]);
       if($req->BoughtType == 'cash')
        {
           $cashAmount=$req->cashAmount;
           $checkType=null;
           $lenderNamevalue=null;
        }
        else if($req->BoughtType == 'check')
        {
           $cashAmount=$req->checkAmount;
           $checkType=$req->checkType;
            $lenderNamevalue=null;
        }
       else if($req->BoughtType == 'borrow')
         {
         $cashAmount=$req->lendAmount;
          $checkType=null;
           $lenderNamevalue=$req->LenderName;
         }
         else
         {
          dd('this');
         }
          $ItemId=$inventory->id;
          $bought =bought::create([
        'ItemId'=>$ItemId,
        'BoughtType'=>$req->BoughtType,
        'cashAmount'=> $cashAmount,
        'checkType'=> $checkType,
        'LenderName'=> $lenderNamevalue,

       ]);
            if($inventory && $bought)
           {
           DB::commit();

           return back()->with('success', 'Item registers successfully');
            }
           else{

            DB::rollback();
            return back()->with('error',' some thing wrong Item is not save!');
           }
        }
            catch (Exception $e)
             {
             	DB::rollback();
       return back()->with('error',' some thing wrong Item is not save!');

             }
    }

     public function transferToShop(Request $req)
    {

     $Items =Items::where('itemCode',$req->itemCode)->first();

     $ItemInStore=$Items->itemInStore-$req->itemquantity;
      $itemInshop=$Items->itemInshop+$req->itemquantity;
                  $Items->update([
                    'itemInshop'=>$itemInshop,
                       'itemInStore'=>$ItemInStore,
        ]);
      return redirect()->route('ItemList')->with('success','Transfer successfully');
    }
    public function transferToStore(Request $req)
    {

     $Items =Items::where('itemCode',$req->itemCode)->first();
     $ItemInStore=$Items->itemInStore+$req->itemquantity;
      $itemInshop=$Items->itemInshop-$req->itemquantity;
                  $Items->update([
                    'itemInshop'=>$itemInshop,
                       'itemInStore'=>$ItemInStore,
        ]);
      return redirect()->route('ItemList')->with('success','Transfer successfully');
    }




       public function payCreditAmount(Request $req)
    {

     $Itembought =bought::where('ItemId',$req->itemID)->first();

     $paidAmount=$Itembought->cashAmount-$req->cashAmountValue;


                  $Itembought->update([
                    'cashAmount'=>$paidAmount,

        ]);
      return back()->with('success','paid  successfully');
    }

 public function getStoreItem()
    {
         $ItemList =Items::where('itemInStore','>',0)->get();

           return view('inventory.store',compact('ItemList'));
    }


}
