<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/profile.name is required'),
            'email.required' => __('admin/loging.you must enter email'),
            'email.email' => __('admin/loging.email is invalid'),
            'password.required' => __('admin/loging.password is required'),
            'password.confirmed' => __('admin/profile.please confirm the password'),
            'password.min' => __('admin/profile.must be at least 10 characters in length'),
            'password.regex' => __('admin/profile.this password is too easy to guess. Please create a new one.')
            ];
    }
}
