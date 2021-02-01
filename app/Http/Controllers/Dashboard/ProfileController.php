<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;


class ProfileController extends Controller
{
    public function editProfile()
    {
        $admin = Admin::find(auth('admin')->user()->id);

        return view('dashboard.profile.edit', compact('admin'));

    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        //validate
        // db

        try {

            //$admin = Admin::find(auth('admin') -> user() -> id);

            //if (!Hash::check($request->get('current_password')))
            //if ($request->filled('current_password')) {
             //   $request->merge(['current_password' => bcrypt($request->password)]);
             //}
             //DB::beginTransaction();
             $hashedPassword = Auth::user()->password;
             //dd(\Hash::check($request->current_password , $hashedPassword ));
             if (\Hash::check($request->current_password , $hashedPassword )) {
       
               if (!\Hash::check($request->password , $hashedPassword)) {
       
                    $users =admin::find(Auth::user()->id);
                    $users->password = bcrypt($request->password);
                    admin::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
       
                    session()->flash('message','password updated successfully');
                    return redirect()->back()->with(['success' =>__('admin/setting.successfully updated')]);
                  }
       
                  else{
                        return redirect()->back()->with(['error' => __('admin/setting.new password can not be the old password!')]);

                      }
       
                 }
       
                else{
                    return redirect()->back()->with(['error' => __('admin/setting.there is a mistake, please try again later')]);

                   }
       
       
            unset($request['id']);
            unset($request['current_password']);
            unset($request['password_confirmation']);
            //unset($request['id'], $request['password_confirmation']);
            $admin->update($request->all());    
           

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('admin/setting.there is a mistake, please try again later')]);

        }

    }   


}
