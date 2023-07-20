<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'product_id' => ['required', 'integer'],
            'image' => ['nullable','mimes:jpg,png,jpeg,webp'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
