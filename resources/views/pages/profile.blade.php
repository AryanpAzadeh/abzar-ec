@extends('layouts.master')

@section('content')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{route('page.index')}}">خانه</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">پروفایل من</li>
                        </ul>
                        <h1 class="title">شما عضو اینجا هستید</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="/assets/images/product/product-45.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="axil-dashboard-author">
                    <div class="media">

                        <div class="media-body">
                            <h5 class="title mb-0">سلام، {{$user->name}} عزیز </h5>
                            <span class="joining-date">عضو اینجا از {{verta($user->created_at)->format('d/m/Y')}}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard"
                                       role="tab" aria-selected="true"><i class="fas fa-th-large"></i>داشبورد</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab"
                                       aria-selected="false"><i class="fas fa-shopping-basket"></i>سفارشات</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab"
                                       aria-selected="false"><i class="fas fa-home"></i>آدرس</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab"
                                       aria-selected="false"><i class="fas fa-user"></i>جزئیات پروفایل</a>
                                    <a class="nav-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                                            class="fal fa-sign-out"></i>خروج</a>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                <div class="axil-dashboard-overview">
                                    <div class="welcome-text">سلام {{$user->name}}<br> ({{$user->name}} <span>نیستید؟</span>



                                        <a
                                            href="{{route('logout')}}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">خروج</a>)

                                    </div>
                                    <form action="{{route('logout')}}" method="post" id="logout-form">
                                        @csrf
                                    </form>

                                    <p>از داشبورد حساب خود می توانید سفارشات اخیر خود را مشاهده کنید ، آدرس های حمل
                                        و نقل و صورتحساب خود را مدیریت کرده و رمز عبور و جزئیات حساب خود را ویرایش
                                        کنید.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">سفارش</th>
                                                <th scope="col">تاریخ</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">جمع کل</th>
                                                <th scope="col">عملیات</th>
                                                <th scope="col">مرجوعی</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <th scope="row">{{$order->order_number}}</th>
                                                    <td>{{\Hekmatinasser\Verta\Verta::instance($order->created_at)->format('%d %B  %Y')}}</td>
                                                    <td>
                                                        @switch($order->status)
                                                            @case('pending')
                                                                در صف تایید
                                                                @break
                                                            @case('processing')
                                                                درحال پردازش
                                                                @break
                                                            @case('completed')
                                                              تکمیل شده
                                                                @break
                                                            @case('sending')
                                                                ارسال شده
                                                                @break
                                                            @case('decline')
                                                                لغو شده
                                                                @break
                                                        @endswitch
                                                    </td>
                                                    <td>{{number_format($order->grand_total, null , '٬')}} تومان برای {{$order->item_count}} محصول</td>
                                                    <td><button onclick="load_order({{$order->id}})" class="axil-btn view-btn">نمایش</button></td>
                                                    <td><button data-bs-toggle="modal" data-bs-target="#exampleModal" class="axil-btn view-btn">درخواست</button></td>
                                                </tr>



                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">درخواست مرجوعی برای سفارش : {{$order->order_number}}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{route('profile.store_problem' , $order->id)}}" enctype="multipart/form-data" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>شرح مسئله</label>
                                                                            <textarea name="description" placeholder="بنویسید ..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="mb-3">
                                                                                <input class="form-control-sm" name="image" type="file">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="submit"
                                                                            class="axil-btn btn-bg-primary w-auto">ثبت درخواست</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- Start Cart Area  -->
                                        <div class="axil-product-cart-area axil-section-gap">
                                            <div class="text-center hidden" id="load-order">
                                                <div class="spinner-border text-dark" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="container" id="order">

                                            </div>
                                        </div>
                                        <!-- End Cart Area  -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                <div class="axil-dashboard-address">
                                    <p class="notice-text">آدرس زیر به طور پیش فرض در صفحه پرداخت استفاده می
                                        شود.</p>
                                    <div class="row row--30">
                                        <div class="col-lg-12">
                                            <div class="address-info mb--40">
                                                <div
                                                    class="addrss-header d-flex align-items-center justify-content-between">
                                                    <h4 class="title mb-0">آدرس شما</h4>
                                                </div>
                                                <form action="{{route('profile.address.update')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-md-12">
                                                        <textarea name="address"  placeholder="لطفا آدرس خود را وارد کنید">{{$user->address != 'بدون آدرس' ? $user->address : ''}}</textarea>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mt--5">
                                                            <input type="submit" class="axil-btn" value="ذخیره">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" method="post" action="{{ route('profile.update') }}">
                                            @csrf
                                            @method('patch')
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>نام</label>
                                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>شماره تماس</label>
                                                        <input name="phone" type="tel" class="form-control" value="{{$user->phone}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>نام کاربری / آدرس ایمیل</label>
                                                        <input name="email" type="email" class="form-control" value="{{$user->email}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="submit" class="axil-btn" value="ذخیره">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="account-details-form" method="post" action="{{ route('password.update') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="title">تغییر رمز عبور</h5>
                                                    <div class="col-md-12 mb-5">
                                                        <span>توجه: درصورت پر شدن فیلد <b>رمز عبور فعلی</b> به صورت اتوماتیک، لطفا مقدار را پاک کرده و به صورت دستی رمز عبور خود را تایپ کنید</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>رمز عبور فعلی</label>
                                                        <input type="password" class="form-control"
                                                                name="current_password"  placeholder="رمز عبور خود را وارد کنید">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>رمز عبور جدید</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>تکرار رمز عبور جدید</label>
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="ذخیره">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->

    <!-- Start Axil Newsletter Area  -->
    @include('layouts.news_letter')
    <!-- End Axil Newsletter Area  -->
@endsection
@section('script')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(\Illuminate\Support\Facades\Session::has('success'))
        swal({
            title: "",
            text: "{{session('success')}}",
            icon: "success",
            button: "بستن این پیغام",
        });
        @endif
    </script>

    <script>
        @if(count($errors))
        swal({
            title: "خطا",
            text: "{{$errors->first()}}",
            icon: "error",
            button: "متوجه شدم",
        });
        @endif
    </script>


    <script>
        $(document).ready(function () {
            $('#load-order').hide();
        });

        function load_order(id){
            $("#order_detail").remove();
                    $.ajax({
                        url: '/profile/get/order/detail',
                        datatype: "html",
                        method: "post",
                        data:{
                            "id": id,
                            "_token": "{{ csrf_token() }}",
                        },
                        beforeSend: function () {
                            $('#load-order').show();
                        },
                        success: function (response) {
                            // alert('ssss');

                            $('#load-order').hide();
                            $("#order").html(response);

                        },
                        error: function(request,status,errorThrown) {
                            alert(errorThrown + ' ' + status + ' ' + request)
                        }
                    })
        }
    </script>

@endsection
