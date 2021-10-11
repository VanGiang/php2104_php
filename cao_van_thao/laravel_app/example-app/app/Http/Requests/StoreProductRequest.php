<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Valirequetsname;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'max:50', new Valirequetsname],
            'image' => 'mimes:jpeg,jpg,png|max:20000',
            'price' => 'required|numeric',
            'description' => 'required|max:500',
            'quantity' => 'required|numeric',
            'sale_off' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'không được để trống',
            'name.max' => 'không nhiều hơn 50 ký tự',
            'image.mimes' => 'phải có đuôi file jpeg, jpg, png',
            'image.max' => 'không nhiều hơn 20GB',
            'price.required' => 'không được để trống',
            'price.numeric' => 'phải có ký tự số',
            'description.required' => 'không được để trống',
            'description.max' => 'không nhiều hơn 500 ký tự',
            'quantity.required' => 'không được để trống',
            'quantity.numeric' => 'phải có ký tự số',
            'sale_off.required' => 'không được để trống',
            'sale_off.numeric' => 'phải có ký tự số',
        ];
    }
}
