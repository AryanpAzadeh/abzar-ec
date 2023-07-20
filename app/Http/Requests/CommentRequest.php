<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'email' => 'required',
            'comment' => 'required',
            'g-recaptcha-response' => 'recaptcha|required',
            ];
    }

    public function messages()
    {
        return [
          'name.required' => 'لطفا نام خود را وارد کنید'  ,
          'email.required' => 'لطفاایمیل را وارد کنید'  ,
          'comment.required' => 'لطفا نظر خود را بنویسید'  ,
            'g-recaptcha-response.required' => 'وارد کردن عبارت امنیتی الزامی است',
            'g-recaptcha-response.recaptcha' => 'عبارت امنیتی به درستی وارد نشده است'
        ];
    }
}
