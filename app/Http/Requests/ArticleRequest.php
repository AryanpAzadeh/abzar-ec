<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required',
            'sub_title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tag' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان الزامی است',
            'sub_title.required' => 'توضیج کوتاه الزامی است',
            'body.required' => 'متن مقاله الزامی است',
            'category.required' => 'دسته بندی الزامی است',
            'tag.required' => 'کلمات کلیدی الزامی است',
            'image.mimes' => 'فرمت های مجاز برای انتخاب ، png,jpg,jpeg,webp است',
        ];
    }
}
