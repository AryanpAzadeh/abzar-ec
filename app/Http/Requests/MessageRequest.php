<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'recaptcha|required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'نام الزامی است'  ,
            'phone.required' => 'شماره تماس الزامی است'  ,
            'email.required' => 'آدرس ایمیل الزامی است',
            'email.email' => 'لطفا آدرس ایمیل را به درستی وارد کنید',
            'message.required' => 'لطفا متن پیام خود را بنویسید',
            'g-recaptcha-response.required' => 'وارد کردن عبارت امنیتی الزامی است',
            'g-recaptcha-response.recaptcha' => 'عبارت امنیتی به درستی وارد نشده است'
        ];
    }
}
