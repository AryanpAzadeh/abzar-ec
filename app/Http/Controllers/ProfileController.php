<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{

    public function profile()
    {
        $user = \auth()->user();
        $orders = $user->orders()->orderBy('id' , 'desc')->get();

        return view('pages.profile' , compact('user' , 'orders'));
    }

    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());



        $request->user()->save();

        Session::flash('success','اطلاعات با موفقیت ویرایش شد');
        return Redirect::back();
    }

    public function update_address(Request $request)
    {
        $validated = $request->validate( [
            'address' => ['required'],
        ]);
        $request->user()->fill($validated);


        $request->user()->save();

        Session::flash('success','آدرس با موفقیت ویرایش شد');
        return Redirect::back();
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function get_order(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id' , $id)->first();
        $data = '';
        if ($request->ajax()) {
            $data .= '
             <div class="axil-product-cart-wrap" id="order_detail">
                                                    <div class="product-table-heading">
                                                        <h4 class="title">'.$order->order_number.'</h4>
                                                        <p class="cart-clear">شماره پیگیری : '.$order->post_tracking.'<p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table axil-product-table axil-cart-table mb--40">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col" class="product-title"></th>
                                                                <th scope="col" class="product-price">قیمت</th>
                                                                <th scope="col" class="product-quantity">تعداد</th>
                                                                <th scope="col" class="product-subtotal">قیمت نهایی</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>';
                                                                foreach(\Illuminate\Support\Facades\DB::table('order_items')->where('order_id' , $order->id)->get() as $item)
                                                                {
                                                             $data .= '
                                                            <tr>

                                                                <td class="product-title">';
                                                                    foreach (\App\Models\Product::where('id' , $item->product_id)->get() as $product) {
                                                                        $data .= '<a href="'.route('page.single_product' , $product->slug).'">'.$product->title.'</a>';
                                                                    }
                                                                    $data .= '
                                                                </td>
                                                                <td class="product-price" data-title="قیمت">'.number_format($item->price).' <span
                                                                        class="currency-symbol">تومانء</span></td>
                                                                <td class="product-quantity" data-title="تعداد">
                                                                   '.$item->quantity.'
                                                                </td>
                                                                <td class="product-subtotal" data-title="قیمت نهایی">'.number_format($item->quantity * $item->price).'<span
                                                                        class="currency-symbol">تومانء</span></td>
                                                            </tr>';
                                                                }


            $data .= '
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                                                            <div class="axil-order-summery mt--80">
                                                                <div class="summery-table-wrap">
                                                                    <table class="table summery-table mb--30">
                                                                        <tbody>
                                                                        <tr class="order-subtotal">
                                                                            <td>تخفیف</td>';
                                                                            $data .= '
                                                                            <td>';
                                                                            if (in_array('discount',$order->coupon))
                                                                            {
                                                                                number_format($order->coupon['discount']['parsedRawValue']);$data .= 'تومانء';
                                                                            }


                                                                                $data .= '
                                                                                        <span>0 تومانء</span>
                                                                                    </td>





                                                                        </tr>
                                                                        <tr class="order-subtotal">
                                                                            <td>مبلغ جزء</td>
                                                                            <td>'.number_format($order->sub_total, null , '٬').' تومانء</td>

                                                                        </tr>
                                                                        <tr class="order-subtotal">
                                                                            <td>حمل و نقل</td>
                                                                            <td>'.number_format($order->shipping, null , '٬').' تومانء</td>

                                                                        </tr>
                                                                         <tr class="order-subtotal">
                                                                            <td>مبلغ کل</td>
                                                                            <td>'.number_format($order->grand_total, null , '٬').' تومانء</td>

                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>






            ';
            return $data;
        }
    }


    public function store_problem(Request $request , $order)
    {
        \Validator::validate($request->all() , [
           'description' => 'required',
           'image' => 'mimes:jpg,png,jpeg,webp'
        ]);

        $p = Problem::create([
           'order_id' =>  $order,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image'))
        {
            $name = 'problem-'.$p->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/problem_images'), $name)) {

                $p->image = $name;
                $p->save();
            }
        }
        Session::flash('success',' با موفقیت ثبت شد');
        return redirect()->back();
    }
}
