<?php

namespace App\Http\Controllers;
use App\Models\areaofWork;
use App\Models\portfolio;
use App\Models\department;
use App\Models\staff;
use App\Models\Requirnment;
use Illuminate\Http\Request;

class setting extends Controller
{
      public function staffregisterform()
     {
          $Department=department::all();
          return view('LookUps.StaffReg',compact('Department'));
     }

      public function createStaff(Request $req)
     {
        $satff =new staff;
        $satff->name= $req->name;
        $satff->email= $req->email;
        $satff->phone= $req->phone;
        $satff->Dep_ID= $req->dep_id;
        $satff->save();
        return redirect()->back();
     }
    public function areaName(Request $req)
    {
    	//dd($req->areaName);
    	$Area =new areaofWork;
        $Area->areaName= $req->areaName;
        $Area->save();
        return redirect()->back();
  
    }
       public function createPortfolio(Request $req)
    {
    	//dd($req->areaName);
    	$Portfoliio =new portfolio;
        $Portfoliio->PortfolioName= $req->PortfolioName;
        $Portfoliio->save();
        return redirect()->back();
  
    }
    public function createDepartment(Request $req)
    {
        //dd($req->areaName);
        $department =new department;
        $department->dep_name= $req->dep_name;
        $department->save();
        return redirect()->back();
  
    }
     public function RequirnmentSave(Request $req)
    {
     // dd($req->ReqReference);
      $Requirnment =new Requirnment;
     $Requirnment->ReqNmae= $req->ReqNmae;
     if($req->ReqReference == null )
     {
      $Requirnment->ReqReference="please Register And Find The Number";
     }
     else
     {
          $Requirnment->ReqReference= $req->ReqReference;
     }
 
     $Requirnment->save();
      return redirect()->back();
   
  
    }
}
