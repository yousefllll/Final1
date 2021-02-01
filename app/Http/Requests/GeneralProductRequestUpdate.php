<?php

namespace App\Http\Requests;

use App\Http\Enumerations\CategoryType;
use Illuminate\Foundation\Http\FormRequest;

class GeneralProductRequestUpdate extends FormRequest
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
            'name' => 'max:100',
            'slug' => 'unique:products,slug',
            'description' => 'max:1000',
            'short_description' => 'nullable|max:500',
            'categories' => 'array|min:1|', //[]
            'categories.*' => 'exists:categories,id',
            'tags' => 'nullable',
            //'brand_id' => 'exists:brands,id'

        ];
    }
    
    public function messages()
    {
        return [

            //'name.required' => __('admin/setting.name is required'),
            //'slug.required' => __('admin/setting.slug is required'),
            //'description.required' => __('admin/setting.description is required'),


            ];
    }

}
