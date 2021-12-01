<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\reques_form;



use DB;



class user extends Controller
{
   public function countuser()
   {
   	//return view('admin.home');
   $totaluser=DB::table('users')->count();
   $adminuser = DB::table('users')->where('role', "SystemAdmin")->count();
   $tenderchecker = DB::table('users')->where('role', "tenderchecker")->count();
   $tenderAdmin = DB::table('users')->where('role', "tenderAdmin")->count();
   $tenderEncoder = DB::table('users')->where('role', "tenderEncoder")->count();
   $subjectExpert = DB::table('users')->where('role', "SubMaterExpert")->count();
   $RequestCart = DB::table('request')
         ->select('request.*','users.name')
          ->leftJoin('users', 'request.requested_By', '=', 'users.id')
          ->where('request.Req_Status',0)
          ->count();
   $list=DB::table('users')->get();
  	return view('admin.home',compact('totaluser','list','adminuser','tenderchecker','tenderAdmin','tenderEncoder',
      'subjectExpert','RequestCart'));
   } 
   public  function viewuser()
   {
     $data=DB::table('users')->get();

   	return view('admin.userlist',compact ('data'));
   }
  public function update(Request $request,$id)
    {
      $users = DB::table('users')
                    ->where('id', $id)->update(['name' => $request->name,
                                                'email'=>$request->email,
                                                'role' =>$request->role ]); 
            return redirect('/Adminhome');   
    }
}
