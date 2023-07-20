<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Product $product, Request $request)
    {



        $product = array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->discount ? $product->price - ($product->price * $product->discount / 100) : $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'date' => Carbon::now(),
            ),
            'associatedModel' => $product
        );

        \Cart::session(auth()->id())->add($product);
        Session::flash('success','با موفقیت به سبد خرید اضافه شد');
        return redirect()->back();

//        return redirect()->route('page.shopping.cart');
    }

    public function update_product($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);
        $product = \App\Models\Product::find($itemId);
        $product = array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->discount ? $product->price - ($product->price * $product->discount / 100) : $product->price,
            'quantity' =>1,
            'attributes' => array(
                'date' => Carbon::now(),
            ),
            'associatedModel' => $product
        );

        \Cart::session(auth()->id())->add($product);

        return redirect()->route('page.shopping.cart');
    }

    public function delete($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);
        $this->check_empty(auth()->user()->id);
        return redirect()->route('page.shopping.cart');
    }

    public function update($itemId)
    {
        \Cart::session(auth()->id())->update($itemId,[
            'quantity' => array(
                'relative' => false,
                'value' => \request('quantity')
            ),
        ]);
        Session::flash('success','بروزرسانی شد');
        return redirect()->route('page.shopping.cart');


    }


    public function clear()
    {
        \Cart::session(auth()->id())->clearCartConditions();
        \Cart::session(auth()->id())->clear();
        Session::flash('success','پاک شد');
        return redirect()->route('page.shopping.cart');
    }

    public function check_coupon(Request $request)
    {
        $coupon = Coupon::where([['code' , $request->coupon] , ['active' , 1]])->first();
        if ($coupon)
        {
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'discount',
                'type' => 'discount',
                'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => -$coupon->discount."%",
            ));
            \Cart::session(auth()->id())->condition($condition); // for a speicifc user's cart
            Session::flash('success','کد تخفیف اعمال شد');
            return redirect()->route('page.shopping.cart');
        }
        else
        {
            Session::flash('error','کد تخفیف واردشده نادرست است.');
            return redirect()->route('page.shopping.cart');
        }
    }

    function check_empty($id)
    {
        if (\Cart::session($id)->isEmpty())
        {
            \Cart::session(auth()->id())->clearCartConditions();
        }
    }

    public function checkout()
    {
        $items = \Cart::session(auth()->id())->getContent();
        return view('pages.checkout' , compact('items'));
    }
}
