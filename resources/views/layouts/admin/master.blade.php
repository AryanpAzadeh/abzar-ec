<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>داشبورد - @yield('title')</title>
    @include('layouts.admin.styles')
    @yield('style')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns @yield('body')  navbar-sticky footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

@include('layouts.admin.navbar')


@include('layouts.admin.side_menu')

@yield('content')


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-close" href="#"><i class="bx bx-x"></i></a><a
        class="customizer-toggle" href="#"><i class="bx bx-cog bx bx-spin white"></i></a>
    <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0 mt-n50">سفارشی سازی </h4>
        <small>سفارشی سازی کنید و به صورت زنده مشاهده کنید.</small>
        <hr>
        <!-- Theme options starts -->
        <h5 class="mt-n25">طرح </h5>
        <div class="theme-layouts">
            <div class="d-flex justify-content-start">
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="layoutOptions" value="false" id="radio-light" class="layout-name"
                                   data-layout="" checked>
                            <label for="radio-light">روشن</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="layoutOptions" value="false" id="radio-dark" class="layout-name"
                                   data-layout="dark-layout">
                            <label for="radio-dark">تیره</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="layoutOptions" value="false" id="radio-semi-dark"
                                   class="layout-name" data-layout="semi-dark-layout">
                            <label for="radio-semi-dark">نیمه تیره</label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <!-- Theme options starts -->
        <hr>

        <!-- Menu Colors Starts -->
        <div id="customizer-theme-colors">
            <h5>رنگ های فهرست</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-primary selected" data-color="theme-primary"></li>
                <li class="color-box bg-success" data-color="theme-success"></li>
                <li class="color-box bg-danger" data-color="theme-danger"></li>
                <li class="color-box bg-info" data-color="theme-info"></li>
                <li class="color-box bg-warning" data-color="theme-warning"></li>
                <li class="color-box bg-dark" data-color="theme-dark"></li>
            </ul>
            <hr>
        </div>
        <!-- Menu Colors Ends -->
        <!-- Menu Icon Animation Starts -->
        <div id="menu-icon-animation">
            <div class="d-flex justify-content-between align-items-center">
                <div class="icon-animation-title">
                    <h5 class="pt-25">انیمیشن آیکن ها</h5>
                </div>
                <div class="icon-animation-switch">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" checked id="icon-animation-switch">
                        <label class="custom-control-label" for="icon-animation-switch"></label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!-- Menu Icon Animation Ends -->
        <!-- Collapse sidebar switch starts -->
        <div class="collapse-sidebar d-flex justify-content-between align-items-center">
            <div class="collapse-option-title">
                <h5 class="pt-25">جمع کردن فهرست</h5>
            </div>
            <div class="collapse-option-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
                    <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <!-- Collapse sidebar switch Ends -->
        <hr>

        <!-- Navbar colors starts -->
        <div id="customizer-navbar-colors">
            <h5>رنگ های نوار بالایی</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-white border selected" data-navbar-default=""></li>
                <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
            </ul>
            <small><strong>نکته :</strong> این گزینه تنها در حالت نوار ثابت و در هنگام اسکرول صفحه نمایش داده خواهد شد.</small>
            <hr>
        </div>
        <!-- Navbar colors starts -->
        <!-- Navbar Type Starts -->
        <h5 class="mt-n25">نوع نوار بالایی</h5>
        <div class="navbar-type d-flex justify-content-start">
            <div class="hidden-ele mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="navbarType" value="false" id="navbar-hidden">
                        <label for="navbar-hidden">مخفی</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="navbarType" value="false" id="navbar-static">
                        <label for="navbar-static">ایستا</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="navbarType" value="false" id="navbar-sticky" checked>
                        <label for="navbar-sticky">ثابت</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <hr>
        <!-- Navbar Type Starts -->

        <!-- Footer Type Starts -->
        <h5 class="mt-n25">نوع فوتر</h5>
        <div class="footer-type d-flex justify-content-start">
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="footerType" value="false" id="footer-hidden">
                        <label for="footer-hidden">مخفی</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="footerType" value="false" id="footer-static" checked>
                        <label for="footer-static">ایستا</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="footerType" value="false" id="footer-sticky">
                        <label for="footer-sticky" class="">چسبان</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- Footer Type Ends -->
        <hr>

        <!-- Card Shadow Starts-->
        <div class="card-shadow d-flex justify-content-between align-items-center py-25">
            <div class="hide-scroll-title">
                <h5 class="pt-25">سایه کارت</h5>
            </div>
            <div class="card-shadow-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="card-shadow-switch">
                    <label class="custom-control-label" for="card-shadow-switch"></label>
                </div>
            </div>
        </div>
        <!-- Card Shadow Ends-->
        <hr>

        <!-- Hide Scroll To Top Starts-->
        <div class="hide-scroll-to-top d-flex justify-content-between align-items-center py-25">
            <div class="hide-scroll-title">
                <h5 class="pt-25">مخفی سازی دکمه اسکرول به بالا</h5>
            </div>
            <div class="hide-scroll-top-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
                    <label class="custom-control-label" for="hide-scroll-top-switch"></label>
                </div>
            </div>
        </div>
        <!-- Hide Scroll To Top Ends-->
    </div>
</div>
<!-- End: Customizer-->

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-left d-inline-block">© طراحی و توسعه با<i class="bx bxs-heart ml-50 font-small-3"></i> و<i class="bx bxs-coffee ml-50 font-small-3"></i> توسط <a href="https://aryazdh.ir/" target="_blank">آریا آزاده</a> ( <a
                href="https://www.idgn.ir/" target="_blank">استودیو خلاقیت آی دیزاین</a> ) 2022 - {{\Carbon\Carbon::now()->year}} </span><span
            class="float-left d-sm-inline-block d-none"></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
    </p>
</footer>
<!-- END: Footer-->


@include('layouts.admin.scripts')
@yield('script')
</body>
<!-- END: Body-->
</html>
