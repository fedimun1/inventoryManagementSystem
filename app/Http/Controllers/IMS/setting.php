<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\itemCategory;
use App\Models\itemSubCategory;
use App\Models\Brand;
use App\Models\Manufacture;
use App\Models\bank;
use App\Models\BankAccount;
use DB;
use Response;
class setting extends Controller
{


	public function getSubCatagory()
	{
		$itemCatagory= DB::table('itemCategory')->get();
		 return view('Inventory.subcategory',compact('itemCatagory'));
	}
    public function getBankAccount()
    {
        $getBank= DB::table('banks')->orderby('name','ASC')->get();
         return view('Inventory.BankAccount',compact('getBank'));
    }

   public function creatCategory(Request $req)
    {
    	//dd($req->areaName);
    	$catagort =new itemCategory;
        $catagort->itemCatName= $req->Category;
        $catagort->save();
        return redirect()->back();
  
    }

    public function creatSubCategory(Request $req)
    {
    
    	$subCat =new itemSubCategory;
        $subCat->itemCatID= $req->subCatId;
        $subCat->itemSubCatName= $req->SubCategoryname;
        $subCat->save();
        return redirect()->back();
  
    }

     public function creatBrand(Request $req)
    {
        //dd($req->areaName);
        $brand =new Brand;
        $brand->BrandName= $req->brand;
        $brand->save();
        return redirect()->back();
  
    }


     public function creatManufacture(Request $req)
    {
        //dd($req->areaName);
        $Manufacture =new Manufacture;
        $Manufacture->ManufactureName= $req->manufacture;
        $Manufacture->save();
        return redirect()->back();
  
    }
         public function creatBank(Request $req)
    {
       
        $bank =new bank;
        $bank->name= $req->name;
        $bank->save();
        return redirect()->back();
  
    }

    public function creatBankAccount(Request $req)
    {
       $bankAcc =new BankAccount;
        $bankAcc->AcHolder= $req->AcHolder;
         $bankAcc->AccNumber= $req->AccNumber;
          $bankAcc->bankID= $req->bankID;
        $bankAcc->save();
        return redirect()->back();
    }
}
