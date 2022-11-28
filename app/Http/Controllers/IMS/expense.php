<?php

namespace App\Http\Controllers\IMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\expenseModel;

use DB;

class expense extends Controller
{
	public function Expense()
		{

			$expenseList=DB::table('expense')->get();

			return view('Inventory.Expense',compact('expenseList'));
		}

    public function postExpense(Request $req)
    {


		if($req->paymentReason == 'other')
		{
			$req->paymentReason=$req->otherReasonType;
		}

        $rules = [

			'paymentReason' => 'required',
			'paymentType' => 'required',
			'expenseAmount' => 'required',
			'paidDate' => 'required',
			'payer' => 'required',
		];
		$validator = Validator::make($req->all(),$rules);
		if ($validator->fails()) {
			return back()->with('error', 'filds are required');
		}
		else
		{
			DB::beginTransaction();
		try {
		 $expense =expenseModel::create([
			'paymentReason'=>$req->paymentReason,
			'paymentType'=>$req->paymentType,
			'expenseAmount'=>$req->expenseAmount,
			'labourCount'=>$req->labourCount,
			'payer'=>$req->payer,
			'paidDate'=>$req->paidDate,
			'lbourName'=>$req->lbourName,

			]);
			if($expense)
			{
			DB::commit();

			return back()->with('success', 'Expense Register Sucessfully');
			 }
			else{

			 DB::rollback();
			 return back()->with('error',' some thing wrong Item is not save!');
			}
		} catch (\Throwable $th) {

			return back()->with('error','unable to save expense there some exception is handle');
		}


		}
    }
}
