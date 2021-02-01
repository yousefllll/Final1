<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this -> id,
            //'current_password' => 'required|exists:admins,password',
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one number
                //'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        
        ];
    }  
         
    public function messages()
    {
        return [

          'name.required' => __('admin/profile.name is required'),
          'email.required' => __('admin/profile.email is required'),
          'email.unique' => __('admin/profile.email is invalid'),
          //'current_password.required' => __('admin/profile.current password is required'),
          'password.required' => __('admin/profile.password is required'),
          'password.confirmed' => __('admin/profile.please confirm the password'),
          'password.min' => __('admin/profile.must be at least 10 characters in length'),
          'password.regex' => __('admin/profile.this password is too easy to guess. Please create a new one.')
                


        ];
    }

}
