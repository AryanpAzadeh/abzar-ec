@extends('layouts.master')

@section('content')
    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form action="{{route('store.checkout')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">جزئیات صورتحساب</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>نام و نام خانوادگی <span>*</span></label>
                                        <input type="text" id="first-name" name="name" value="{{auth()->user()->name}}" placeholder="احمد احمدی" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>استان <span>*</span></label>
                                <input type="text" id="town" name="state" placeholder="تهران" required>
                            </div>
                            <div class="form-group">
                                <label>شهر <span>*</span></label>
                                <input type="text" id="country" name="city" placeholder="تهران" required>
                            </div>
                            <div class="form-group">
                                <label>آدرس <span>*</span></label>
                                <input type="text" id="address1" name="address" class="mb--15" placeholder="نام خیابان و پلاک" value="{{auth()->user()->address}}" required>
                            </div>
                            <div class="form-group">
                                <label>کد پستی <span>*</span></label>
                                <input type="number" id="address1" class="mb--15" name="post_code" placeholder="1253698541" required>
                            </div>
                            <div class="form-group">
                                <label>شماره تماس <span>*</span></label>
                                <input type="tel" id="phone" name="phone" placeholder="09111111111" required value="{{auth()->user()->phone}}">
                            </div>
                            <div class="form-group">
                                <label>ایمیل <span>*</span></label>
                                <input type="email" id="email" name="email" placeholder="google@gmail.com" value="{{auth()->user()->email}}" required>
                            </div>
                            <div class="form-group">
                                <label>توضیحات (اختیاری)</label>
                                <textarea id="notes" rows="2" name="notes"
                                          placeholder="یادداشت هایی در مورد سفارش شما ، به عنوان مثال یادداشت های ویژه برای تحویل."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">سفارش شما</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                    <tr>
                                        <th>محصول</th>
                                        <th>قیمت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr class="order-product">
                                            <td>{{$item->name}} ( <span class="quantity">{{$item->quantity}} عدد </span>) </td>
                                            <td>{{number_format(\Cart::session(auth()->id())->get($item->id)->getPriceSum(), null , '٬')}} تومان </td>
                                        </tr>
                                    @endforeach

                                    <tr class="order-subtotal">
                                        <td>مبلغ سفارش {{\Cart::session(auth()->id())->getConditions()->count() >= 2 ? '(با احتساب کد تخفیف)' : ''}}</td>
                                        <td>{{number_format(\Cart::session(auth()->id())->getSubTotal(), null , '٬')}}  تومان</td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <div class="shipping-amount">
                                                <span class="title">نحوه ارسال</span>
                                                <span class="amount">{{number_format(\App\Models\Setting::first()->value)}} تومان</span>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" id="radio1" name="shipping" checked>
                                                <label for="radio1">از طریق پست پیشتاز</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>مبلغ نهایی</td>
                                        <td class="order-total-amount">{{number_format(\Cart::session(auth()->id())->getTotal(), null , '٬')}}  تومان</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio4" name="payment" checked>
                                        <label for="radio4">انتقال مستقیم بانک</label>
                                    </div>
                                    <p>لطفا پس از تکمیل اطلاعات ، روی دکمه "پرداخت سفارش" کلیک کنید تا به درگاه بانکی منتقل شوید . پس از پرداخت مبلغ مشخص شده سفارش شما ثبت و در کمترین زمان ممکن پردازش می شود</p>
                                </div>

                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">پرداخت سفارش</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->
@endsection
