@extends('layouts.admin.master')
@section('title' , 'جزئیات سفارش')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/pages/app-invoice.css')}}">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- app invoice View Page -->
                <section class="invoice-view-wrapper">
                    <div class="row">
                        <!-- invoice view page -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-print-area">
                                <div class="card-content">
                                    <div class="card-body pb-0 mx-25">
                                        <!-- header section -->
                                        <div class="row line-height-2 mt-n50">
                                            <div class="col-xl-4 col-md-12 mb-50 mb-xl-0">
                                                <span class="invoice-number mr-50">شماره صورتحساب</span>
                                                <span>{{$order->order_number}}</span>
                                            </div>
                                            <div class="col-xl-8 col-md-12">
                                                <div class="d-flex align-items-center justify-content-xl-end flex-wrap">
                                                    <div class="mr-3">
                                                        <small class="text-muted">تاریخ تنظیم:</small>
                                                        <span>{{\Hekmatinasser\Verta\Verta::instance($order->created_at)->format('%d %B  %Y')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- logo and title -->
                                        <div class="row my-3">
                                            <div class="col-sm-6">
                                                <h4 class="text-primary">صورتحساب</h4>
                                                <span>خرید از فروشگاه اینترنتی < اینجا ></span>
                                            </div>
                                            <div class="mt-1 mt-sm-0 col-sm-6 d-flex justify-content-end">
                                                <img src="{{asset('/assets/images/logo/logo.png')}}" alt="logo" height="46" width="164">
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- invoice address and contact -->
                                        <div class="row invoice-info">
                                            <div class="col-6 mt-1">
                                                <h6 class="invoice-from">صورتحساب از</h6>
                                                <div class="mb-75">
                                                    <span>فروشگاه اینترنتی < اینجا ></span>
                                                </div>
                                                <div class="mb-75">
                                                    <span>آدرس اینجا</span>
                                                </div>
                                                <div class="mb-75">
                                                    <span>contact@iinja.ir</span>
                                                </div>
                                                <div class="mb-75">
                                                    <span class="ltr-text">(+98) 914 543 3701</span>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <h6 class="invoice-to">صورتحساب به</h6>
                                                <div class="mb-75">
                                                    <span>{{$order->name}}</span>
                                                </div>
                                                <div class="mb-75">
                                                    <span>{{$order->state . ' - ' . $order->city}} - {{$order->address}}</span><br>
                                                    <span>کد پستی : {{$order->post_code}}</span>
                                                </div>
                                                <div class="mb-75">
                                                    <span>{{$order->email}}</span>
                                                </div>
                                                <div class="mb-75">
                                                    <span class="ltr-text">شماره تماس : {{$order->phone}}</span>
                                                </div>
                                                <div class="mb-75">
                                                    <span>توضیحات : {{$order->notes}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>


                                    <!-- product details table-->
                                    <div class="invoice-product-details table-responsive mx-md-25">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                            <tr class="border-0">
                                                <th scope="col">آیتم</th>
                                                <th scope="col">قیمت</th>
                                                <th scope="col">تعداد</th>
                                                <th scope="col" class="text-right">قیمت کل</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\Illuminate\Support\Facades\DB::table('order_items')->where('order_id' , $order->id)->get() as $item)
                                                <tr>
                                                    <td>
                                                        @foreach (\App\Models\Product::where('id' , $item->product_id)->get() as $product)
                                                            {{$product->title}}
                                                        @endforeach
                                                    </td>
                                                    <td>{{number_format($item->price)}}</td>
                                                    <td>
                                                        {{$item->quantity}} عدد
                                                    </td>
                                                    <td class="text-primary text-right font-weight-bold">
                                                        {{number_format($item->quantity * $item->price)}} تومان
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- invoice subtotal -->
                                    <div class="card-body pt-0 mx-25">
                                        <hr>
                                        <div class="row">
                                            <div class="col-4 col-sm-6 mt-75">
                                                <p>با تشکر از اعتماد شما.</p>
                                            </div>
                                            <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                                                <div class="invoice-subtotal">
                                                    <div class="invoice-calc d-flex justify-content-between">
                                                        <span class="invoice-title">تخفیف</span>
                                                        <span class="invoice-value">{{in_array('discount',$order->coupon) ? number_format($order->coupon['discount']['parsedRawValue']) : 0}} تومان </span>
                                                    </div>
                                                    <div class="invoice-calc d-flex justify-content-between">
                                                        <span class="invoice-title">جمع جزء</span>
                                                        <span class="invoice-value">{{number_format($order->sub_total, null , '٬')}} تومان </span>
                                                    </div>

                                                    <div class="invoice-calc d-flex justify-content-between">
                                                        <span class="invoice-title">حمل و نقل</span>
                                                        <span class="invoice-value">{{number_format($order->shipping)}} تومان </span>
                                                    </div>
                                                    <hr>
                                                    <div class="invoice-calc d-flex justify-content-between">
                                                        <span class="invoice-title">جمع صورتحساب</span>
                                                        <span class="invoice-value">{{number_format($order->grand_total)}} تومان</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- invoice action  -->
                        <div class="col-xl-3 col-md-4 col-12">
                            <div class="card invoice-action-wrapper shadow-none border">
                                <div class="card-body">
                                    <div class="invoice-action-btn">
                                        <button class="btn btn-primary btn-block invoice-send-btn">
                                            <i class="bx bx-send"></i>
                                            <span>ارسال صورتحساب</span>
                                        </button>
                                    </div>
                                    <div class="invoice-action-btn">
                                        <button class="btn btn-light-primary btn-block invoice-print">
                                            <span>چاپ</span>
                                        </button>
                                    </div>
                                    <hr>
                                    <form action="{{route('admin.order.update.post.tracking' , $order->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="invoice-action-btn">
                                            <input type="text" name="post_tracking" class="form-control text-center" value="{{$order->post_tracking}}" id=""><br>
                                            <button class="btn btn-light-primary btn-block" type="submit">
                                                <span>ذخیره کد پیگیری</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('/admin/assets/js/scripts/pages/app-invoice.js')}}"></script>
@endsection
