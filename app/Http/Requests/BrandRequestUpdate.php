<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequestUpdate extends FormRequest
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
             'photo' => 'required_without:id|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [

            'name.required' => __('admin/setting.name is required'),
            'photo.required_without' => __('admin/setting.photo is required'),
            'photo.mimes' => __('admin/setting.the image format should be jpg, jpeg or png'),

            ];
    }
}
