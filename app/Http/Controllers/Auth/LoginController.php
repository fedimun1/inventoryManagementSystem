<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
        protected $redirectTo = '/';

        protected function redirectTo()
    {

         
            if (auth()->user()->role == 'SystemAdmin') {
                return '/dashboard';
            }
          if (auth()->user()->role == 'tenderAdmin'|| auth()->user()->role =='tenderEncoder'
          || auth()->user()->role == 'tenderchecker'||auth()->user()->role =='SubMaterExpert') 
           {
                return '/UserPanel';
            }
         
            return '/';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
