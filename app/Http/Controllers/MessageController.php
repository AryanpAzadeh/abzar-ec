<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function store(MessageRequest $request)
    {
        $validate = $request->validated();
        Message::create([
           'name' => $validate['name'],
           'phone' => $validate['phone'],
           'email' => $validate['email'],
           'message' => $validate['message']
        ]);
        Session::flash('success',' پیام شما با موفقیت ارسال شد');
        return redirect()->back();
    }

    public function mark(Message $message)
    {
        $message->read = 1;
        $message->save();
        Session::flash('success','با موفقیت انجام شد');
        return redirect()->back();
    }

    public function delete(Message $message)
    {
        $message->delete();
        Session::flash('success','با موفقیت حذف شد');
        return redirect()->back();
    }
}
