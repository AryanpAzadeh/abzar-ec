<!doctype html>
<html class="no-js" lang="fa">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ورود</title>
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
            <div class="col-sm-4">
                <a href="{{route('page.index')}}" class="site-logo"><img src="{{asset('/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-sm-8">
                <div class="singin-header-btn">
                    <p>عضو نیستید؟</p>
                    <a href="{{route('register')}}" class="axil-btn btn-bg-secondary sign-up-btn">ثبت نام کنید</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--9">
                <h3 class="title">ما بهترین محصولات را ارائه می دهیم</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title">وارد اینجا ! شوید.</h3>
                    <p class="b2 mb--55">جهت ورود، اطلاعات خواسته شده را وارد کنید</p>
                    <form class="singin-form" action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="email" class="form-control" name="email" placeholder="annie@example.com">
                        </div>
                        <div class="form-group">
                            <label>رمز عبور</label>
                            <input type="password" class="form-control" name="password" placeholder="123456789">
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">ورود</button>
                            <a href="{{route('password.request')}}" class="forgot-btn">رمز عبور خود را فراموش کرده اید؟</a>
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
