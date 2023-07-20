@extends('layouts.master')
@section('style')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
@endsection


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
                            <li class="axil-breadcrumb-item active" aria-current="page">ارتباط با ما</li>
                        </ul>
                        <h1 class="title">ارتباط با ما</h1>
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

    <!-- Start Contact Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <div class="row row--30">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <h3 class="title mb--10">دوست داریم بیشتر از شما بشنویم.</h3>
                            <p>اگر محصولات خوبی را تهیه کرده اید یا به دنبال کار با ما هستید ، برای ما نظر خود را
                                بنویسید.</p>
                            <form method="POST" action="{{route('store.message')}}">
                                @csrf
                                <div class="row row--10">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-name">نام <span>*</span></label>
                                            <input type="text" name="name" id="contact-name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-phone">شماره تماس <span>*</span></label>
                                            <input type="text" name="phone" id="contact-phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-email">ایمیل <span>*</span></label>
                                            <input type="email" name="email" id="contact-email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-message">پیام شما</label>
                                            <textarea name="message" id="contact-message" cols="1"
                                                      rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            {!! htmlFormSnippet() !!}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb--0">
                                            <button name="submit" type="submit" id="submit"
                                                    class="axil-btn btn-bg-primary">ارسال پیام</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-location mb--40">
                            <h4 class="title mb--20">فروشگاه ما</h4>
                            <span class="address mb--20">ایران، تهران، آزادی</span>
                            <span class="phone">شماره تماس: 0123456789</span>
                            <span class="email">ایمیل: Hello@etrade.com</span>
                        </div>
                        <div class="opening-hour">
                            <h4 class="title mb--20">ساعت کاری :</h4>
                            <p>شنبه تا پنجشنبه: 9 صبح - 10 شب
                                <br> جمعه: 10 صبح - 6 عصر
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Google Map Area  -->
{{--            <div class="axil-google-map-wrap axil-section-gap pb--0">--}}
{{--                <div class="mapouter">--}}
{{--                    <div class="gmap_canvas">--}}
{{--                        <iframe width="1080" height="500" id="gmap_canvas"--}}
{{--                                src="https://maps.google.com/maps?q=melbourne&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- End Google Map Area  -->
        </div>
    </div>
    <!-- End Contact Area  -->
@endsection
