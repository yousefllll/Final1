<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{
    public function login()
    {

        return view('dashboard.auth.login');
    }


    public function postLogin(AdminLoginRequest $request)
    {

        //validation

        //check , store , update
        
        //return $request;
     //try {
        //$remember_me = false;
       // if(isset($request->remember_me))
       // $remember_me = true;
        $remember_me = $request->get('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin.dashboard');
        }
     // } catch (\Exception $ex) {
        return redirect()->back()->with(['error' =>  __('admin/loging.there is an error in username or password')]);
      //}
    }

    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('admin.login');
        
    }

    private function getGaurd()
    {
        return auth('admin');
        
    }
    
    
}
