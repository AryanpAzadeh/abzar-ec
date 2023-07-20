<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'title' => ['required'],
            'price' => ['required' , 'numeric'],
            'discount' => ['nullable' , 'numeric'],
            'image' => ['nullable' , 'mimes:jpg,png,jpeg,webp'],
            'complete_description' => ['nullable'],
            'description' => ['required'],
            'short_description' => ['required'],
            'features' => ['required'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'sub_category_id' => ['nullable'],
        ];
    }
}
