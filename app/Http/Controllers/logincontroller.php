<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
Use App\Models\User;

class logincontroller extends Controller
{
   
   public function create()
   {
   	return view('login.create');
   } 
     public function store(Request $request)
   {
     $scredential =$request->only('email','password');
     //dd($scredential);
    // if(Auth::attempt($scredential))
     {
       $request->session()->regenerate();

       return redirect('/home');
     }
     return redirect('/tender')->withErrors([
'email'=>'the provider credential do not match ',
     ]);

   } 
}
