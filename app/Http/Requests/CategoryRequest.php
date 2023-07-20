<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'name' => ['required'],
            'image' => ['nullable' , 'mimes:png,jpg,jpeg,webp'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
