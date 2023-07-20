<header class="header axil-header header-style-2 header-style-6">
    @if(\App\Models\Coupon::count() > 0)
        <div class="header-top-campaign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-10">
                        <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                            @foreach(\App\Models\Coupon::latest()->where('active' , 1)->get() as $coupon)
                                <div class="slick-slide">
                                    <div class="campaign-content">
                                        <p>{{$coupon->name}} <a href="{{route('page.single_coupon' , $coupon->slug)}}">اطلاعات بیشتر</a></p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Start Header Top Area  -->
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-3 col-5">
                    <div class="header-brand">
                        <a href="{{route('page.index')}}" class="logo logo-dark">
                            <img src="/assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <a href="{{route('page.index')}}" class="logo logo-light">
                            <img src="/assets/images/logo/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 col-7">
                    <div class="header-top-dropdown dropdown-box-style">
                        <div class="axil-search">
                            <form action="{{route('pages.search')}}" method="get">

                            <button type="submit" class="icon wooc-btn-search">
                                <lord-icon
                                    src="https://cdn.lordicon.com/xfftupfv.json"
                                    trigger="hover"
                                    style="width:20px;height:20px">
                                </lord-icon>
                            </button>
                            <input type="search" class="placeholder product-search-input" name="search"
                                   value="" maxlength="128" placeholder="دنبال چه هستید ؟؟"
                                   autocomplete="off">
                        </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area  -->

    <!-- Start Mainmenu Area  -->
    <div class="axil-mainmenu aside-category-menu">
        <div class="container">
            <div class="header-navbar">
                @if(\Illuminate\Support\Facades\URL::current() == route('page.index'))
                    <div class="header-nav-department">
                        @include('layouts.categories')
                    </div>
                @endif
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{route('page.index')}}" class="logo">
                                <img src="/assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li><a href="{{route('page.index')}}">خانه</a></li>


                            <li><a href="{{route('page.products')}}">محصولات</a></li>
                            <li><a href="{{route('page.products.discount')}}">تخفیف دار</a></li>
                            <li><a href="{{route('pages.categories')}}">دسته بندی ها</a></li>
                            <li><a href="{{route('pages.brands')}}">برند ها</a></li>
                            <li><a href="{{route('pages.articles')}}">وبلاگ</a></li>

                            <li><a href="{{route('page.contact')}}">ارتباط با ما</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search2 d-sm-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <lord-icon
                                    src="https://cdn.lordicon.com/xfftupfv.json"

                                    trigger="hover"
                                    style="width:20px;height:20px">
                                </lord-icon>
                            </a>
                        </li>
                        @auth()
                            <li class="wishlist">
                                <a href="{{route('pages.wish_list')}}">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/pnhskdva.json"
                                        trigger="hover"
                                        style="width:30px;height:30px">
                                    </lord-icon>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="{{route('page.shopping.cart')}}" class="cart-dropdown-btn">
                                    <span
                                        class="cart-count">{{\Cart::session(auth()->id())->getContent()->count()}}</span>
                                    <lord-icon
                                        src="https://cdn.lordicon.com/medpcfcy.json"
                                        trigger="hover"
                                        style="width:30px;height:30px">
                                    </lord-icon>
                                </a>
                            </li>
                        @endauth
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <lord-icon
                                    src="https://cdn.lordicon.com/bhfjfgqz.json"
                                    trigger="hover"
                                    style="width:30px;height:30px">
                                </lord-icon>
                            </a>
                            <div class="my-account-dropdown">
                                @auth()
                                    <span class="title">دسترسی سریع</span>
                                    <ul>
                                        <li>
                                            <a href="{{route('profile.profile')}}">پروفایل من</a>
                                        </li>
                                        <li>
                                            <a href="#">شرایط مرجوعی</a>
                                        </li>
                                        <li>
                                            <a href="#">پشتیبانی</a>
                                        </li>
                                        <li>
                                            <a href="#">زبان</a>
                                        </li>
                                    </ul>
                                @endauth
                                @guest()
                                    <div class="login-btn">
                                        <a href="{{route('login')}}" class="axil-btn btn-bg-primary">ورود</a>
                                    </div>
                                @endguest
                                @if(Auth::check())
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <div class="reg-footer mt--15">خوش آمدید {{auth()->user()->name}} عزیز <a
                                                href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                class="btn-link">خروج</a>
                                        </div>
                                    </form>
                                @else
                                    <div class="reg-footer text-center">ثبت نام نکرده اید؟ <a
                                            href="{{route('register')}}"
                                            class="btn-link">ثبت نام.</a>
                                    </div>
                                @endif

                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area  -->
</header>
