<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $validate = $request->validated();


        $order = Order::create([
           'name' => $validate['name'],
           'coupon' => \Cart::session(auth()->id())->getConditions(),
           'state' => $validate['state'],
           'email' => $validate['email'],
           'city' => $validate['city'],
           'post_code' => $validate['post_code'],
           'phone' => $validate['phone'],
           'address' => $validate['address'],
           'notes' => $validate['notes'],
           'shipping' => Setting::first()->value,
            'order_number' => 'inj-' . Carbon::now()->micro,
            'grand_total' => \Cart::session(auth()->id())->getTotal(),
            'sub_total' => \Cart::session(auth()->id())->getSubTotal(),
            'item_count' => \Cart::session(auth()->id())->getContent()->count(),
            'user_id' => auth()->id()
        ]);
        $cartItems = \Cart::session(auth()->id())->getContent();
        foreach ($cartItems as $item)
        {
            $order->items()->attach($item->id , ['price' => $item->price , 'quantity' => $item->quantity]);
        }



        \Cart::session(auth()->id())->clear();

//        return redirect()->route('order.bank' , $order->id);


        Session::flash('success', 'سفارش شما با موفقیت ثبت شد');

////
////
        return redirect()->route('page.index');


    }

    public function update_post_tracking(Request $request , Order $order)
    {
        $order->post_tracking = $request->post_tracking;
        $order->save();
        Session::flash('success', 'با موفقیت ثبت شد');

        return redirect()->back();
    }

    public function mark(Order $order)
    {
        if ($order->status == 'pending')
        {
            $order->status = 'processing';
            $order->save();
        }
        elseif($order->status == 'processing')
        {
            $order->status = 'completed';
            $order->save();
        }
        elseif($order->status == 'completed')
        {
            $order->status = 'sending';
            $order->save();
        }
        elseif($order->status == 'sending')
        {
            $order->status = 'decline';
            $order->save();
        }
        elseif($order->status == 'decline')
        {
            $order->status = 'pending';
            $order->save();
        }
        return redirect()->back();
    }
    public function mark_cancel(Order $order)
    {
        $order->status = 'decline';
        return redirect()->back();
    }

    public function delete(Order $order)
    {
        $order->delete();
        Session::flash('success', 'با موفقیت حذف شد');

        return redirect()->back();
    }




//    Admin Side

    public function orders()
    {
        $orders = Order::orderBy('id' , 'desc')->get();
        return view('pages.admin.orders' , compact('orders'));
    }

    public function detail(Order $order)
    {
        return view('pages.admin.order_detail' , compact('order'));
    }
}
