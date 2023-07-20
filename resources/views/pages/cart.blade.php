@extends('layouts.master')

@section('content')
    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">سبد خرید شما</h4>
                    @if(\Cart::session(auth()->id())->getContent()->count() > 0)
                      <a href="{{route('cart.clear')}}" class="cart-clear">پاک کردن سبد خرید</a>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">محصول</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">قیمت</th>
                            <th scope="col" class="product-quantity">تعداد</th>
                            <th scope="col" class="product-subtotal">قیمت نهایی</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            @if($item->associatedModel->discount != \App\Models\Product::find($item->id)->discount)
                                <input type="hidden" name="id" id="item_id" value="{{$item->id}}">
                                <script>
                                    var id = document.getElementById('item_id').value;
                                    window.location.href = "/cart/up/" + id;
                                </script>
                            @endif
                            <tr>

                                <td class="product-remove"><a href="{{route('cart.delete' , $item->id)}}" class="remove-wishlist"><i
                                            class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="{{route('page.single_product' , $item->associatedModel->slug)}}"><img
                                            src="{{asset('/storage/product_images/' . $item->associatedModel->image)}}"
                                            alt="Digital Product"></a></td>
                                <td class="product-title"><a href="{{route('page.single_product' , $item->associatedModel->slug)}}">{{$item->name}}</a></td>
                                <td class="product-price" data-title="قیمت">{{number_format($item->price , null , '٬')}}  <span
                                        class="currency-symbol">تومان</span></td>
                                <td class="product-quantity" data-title="تعداد">
                                    <form action="{{route('cart.update' , $item->id)}}" id="update-quantity">
                                        <div class="pro-qty">
                                            <input type="number" name="quantity" class="quantity-input" min="1" value="{{$item->quantity}}">
                                        </div>
                                    </form>
                                </td>
                                <td class="product-subtotal" data-title="قیمت نهایی">{{number_format(\Cart::session(auth()->id())->get($item->id)->getPriceSum(), null , '٬')}}<span
                                        class="currency-symbol"> تومان </span></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                @if(\Cart::session(auth()->id())->getContent()->count() > 0)
                    <div class="cart-update-btn-area">
                        <form action="{{route('cart.check.coupon')}}" method="get">
                            <div class="input-group product-cupon">

                                <input placeholder="کد تخفیف" type="text" name="coupon" {{\Cart::session(auth()->id())->getConditions()->count() >= 2 ? 'disabled' : ''}} value="{{\Cart::session(auth()->id())->getConditions()->count() >= 2 ? 'کد تخفیف با موفقیت اعمال شده است.' : ''}}">
                                <div class="product-cupon-btn">
                                    <button type="submit" class="axil-btn btn-outline" style="display: {{\Cart::session(auth()->id())->getConditions()->count() >= 2 ? 'none' : 'block'}}">اعمال</button>
                                </div>

                            </div>
                        </form>
                        <div class="update-btn">
                            <a href="#" onclick="event.preventDefault();
                                                 document.getElementById('update-quantity').submit();" class="axil-btn btn-outline">بروزرسانی</a>
                        </div>

                    </div>

                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <div class="summery-table-wrap">
                                <table class="table summery-table mb--30">
                                    <tbody>
                                    <tr class="order-subtotal">
                                        <td>مبلغ سبد خرید شما</td>
                                        <td>{{number_format(\Cart::session(auth()->id())->getSubTotal(), null , '٬')}}  تومان</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                                <a href="{{route('cart.checkout')}}" class="axil-btn btn-bg-primary checkout-btn">تایید و ادامه</a>

                        </div>
                    </div>
                </div>
                @else
                    <div class="row text-center">
                        <h5>سبد خرید شما خالی است</h5>
                    </div>
                @endif


            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
@endsection

