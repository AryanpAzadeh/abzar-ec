<!doctype html>
<html class="no-js" lang="fa">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ثبت نام</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.styles')

</head>


<body>
<div class="axil-signin-area">

    <!-- Start Header -->
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="{{route('page.index')}}" class="site-logo"><img src="{{asset('/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-md-6">
                <div class="singin-header-btn">
                    <p>قبلا عضو شده اید؟</p>
                    <a href="{{route('login')}}" class="axil-btn btn-bg-secondary sign-up-btn">ورود</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">ما بهترین محصولات را ارائه می دهیم</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title">من اینجا جدید هستم</h3>
                    <p class="b2 mb--55">لطفا اطلاعات زیر را تکمیل کنید</p>
                    <form class="singin-form" action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>نام و نام خانوادگی</label>
                            <input required type="text" class="form-control" name="name" placeholder="احمد احمدی">
                        </div>
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input required type="email" class="form-control" name="email" placeholder="something@example.com">
                        </div>
                        <div class="form-group">
                            <label>شماره تلفن</label>
                            <input required type="tel" class="form-control" name="phone" placeholder="09112223344">
                        </div>
                        <div class="form-group">
                            <label>رمز عبور</label>
                            <input required type="password" class="form-control" name="password" placeholder="123456789">
                        </div>
                        <div class="form-group">
                            <label>تکرار رمز عبور</label>
                            <input required type="password" class="form-control" name="password_confirmation" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">ساخت پروفایل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS
============================================ -->
@include('layouts.scripts')

</body>


</html>
