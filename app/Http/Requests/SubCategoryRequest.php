<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'name' => ['required'],
            'image' => ['nullable' , 'mimes:jpg,jpeg,png,webp'],
            'category_id' => ['required'],
            'categorytitle_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
