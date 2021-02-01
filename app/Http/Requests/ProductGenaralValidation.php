<?php

namespace App\Http\Requests;

use App\Http\Enumerations\CategoryType;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ProductQty;

class ProductGenaralValidation extends FormRequest
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
            'price' => 'required|min:0|numeric',
            'product_id' => 'required|exists:products,id',
            'special_price' => 'nullable|min:0|numeric',
            'special_price_type' => 'required_with:special_price|in:fixed,percent',
            'special_price_start' => 'required_with:special_price',
            'special_price_end' => 'required_with:special_price',


            'sku' => 'nullable|min:3|max:10',
            //'product_id' => 'required|exists:products,id',
            'manage_stock' => 'required|in:0,1',
            'in_stock' => 'required|in:0,1',
            'qty' => 'required_if:manage_stock,==,1',//الكمية
            //'qty'  =>[new ProductQty($this ->manage_stock )]



            //'product_id' => 'required|exists:products,id',
            'document' => 'required|array|min:1',
            'document.*' => 'required|string',
        ];
    }

}
