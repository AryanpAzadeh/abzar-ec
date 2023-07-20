<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                    <div class="brand-logo"><img class="logo" src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/images/logo/logo.png')}}"></div>
                    <h2 class="brand-text mb-0">اینجا</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" navigation-header"><span>داشبورد</span></li>
            <li class=" nav-item"><a href="{{route('admin.home')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">داشبورد</span></a>
            <li class=" navigation-header"><span>محصولات</span></li>
            <li class=" nav-item"><a href="{{route('admin.products')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">* محصولات</span></a>
            <li class=" nav-item"><a href="{{route('product.brand')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">برند ها</span></a>
            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="check"></i><span class="menu-title" data-i18n="Form Elements">مدیریت دسته بندی ها</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('product.category')}}"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Input">دسته بندی اصلی</span></a>
                    <li><a href="{{route('product.category.titles')}}"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Input">عناوین زیر دسته بندی ها</span></a>
                    <li><a href="{{route('product.sub_category')}}"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Input">زیر دسته بندی</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>پیشنهاد ها</span></li>
            <li class=" nav-item"><a href="{{route('offer.offers')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">پیشنهاد ها</span></a>

            <li class=" navigation-header"><span>خبرنامه</span></li>
            <li class=" nav-item"><a href="{{route('admin.newsletter')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">خبرنامه</span></a>
            <li class=" navigation-header"><span>پیام ها</span></li>
            <li class=" nav-item"><a href="{{route('admin.message')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">پیام ها</span></a>

            <li class=" navigation-header"><span>سفارشات</span></li>
            <li class=" nav-item"><a href="{{route('admin.orders')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">سفارشات</span></a>
            <li class=" nav-item"><a href="{{route('admin.problems')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">مرجوعی</span></a>

            <li class=" navigation-header"><span>مقالات</span></li>
            <li class=" nav-item"><a href="{{route('admin.article')}}"><i class="menu-livicon" data-icon="morph-checkbox-3"></i><span class="menu-title" data-i18n="Email">مقالات</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('admin.article.category')}}"><i class="menu-livicon" data-icon="box"></i><span class="menu-title" data-i18n="Email">دسته بندی ها</span></a>
            </li>

            <li class=" navigation-header"><span>تنظیمات</span></li>
            <li class=" nav-item"><a href="{{route('admin.setting_shipping')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">حمل و نقل</span></a>
            <li class=" nav-item"><a href="{{route('slider.slider')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Email">اسلایدر</span></a>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
