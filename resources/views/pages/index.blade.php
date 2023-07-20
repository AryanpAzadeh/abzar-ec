@extends('layouts.master')

@section('content')

    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-2 main-slider-style-8">
        <div class="container">
            <div class="slider-offset-left">
                <div class="row row--20">
                    <div class="col-lg-9">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">
                                @foreach($sliders as $slider)
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <h1 class="title">{{$slider->title}}</h1>
                                            <div class="shop-btn">
                                                <a href="{{$slider->link}}" class="axil-btn">{{$slider->link_title}}<i
                                                        class="fal fa-long-arrow-left"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="{{asset('/storage/slider_images/' . $slider->image)}}" alt="{{$slider->title}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="slider-product-box">
                            <div class="product-thumb">
                                <a href="{{route('page.single_product' , $random_product->slug)}}">
                                    <img src="{{asset('/storage/product_images/' . $random_product->image)}}" alt="{{$random_product->title}}">
                                </a>
                            </div>
                            <h6 class="title"><a href="{{route('page.single_product' , $random_product->slug)}}">{{$random_product->title}}</a></h6>
                            @if($random_product->discount)
                                <span class="price">{{number_format($random_product->price - ($random_product->price * $random_product->discount / 100) , null , '٬')}} تومان</span>
                            @else
                            <span class="price">{{number_format($random_product->price , null , '٬')}} تومان </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Flash Sale Area  -->
    <div
        class="axil-new-arrivals-product-area fullwidth-container flash-sale-area bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="d-md-flex align-items-end flash-sale-section">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="fas fa-fire"></i> امروز</span>
                        <h2 class="title">پیشنهاد های ویژه امروز</h2>
                    </div>
{{--                    <div class="sale-countdown countdown"></div>--}}
                </div>
                <div
                    class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    @foreach($offers as $offer)
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="{{route('page.single_product' , $offer->slug)}}">
                                        <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500"
                                             src="{{asset('/storage/product_images/' . $offer->image)}}" alt="{{$offer->title}}">
                                    </a>
                                    @if($offer->discount)
                                        <div class="label-block label-right">
                                            <div class="product-badget">{{$offer->discount}}% تخفیف</div>
                                        </div>
                                    @endif

                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="{{route('page.single_product' , $offer->slug)}}">{{$offer->title}}</a></h5>
                                        <div class="product-price-variant">
                                            @if($offer->discount)
                                                <span class="price current-price">{{number_format($offer->price - ($offer->price * $offer->discount / 100) , null , '٬')}} تومان </span>
                                                <span
                                                    class="price old-price">{{number_format($offer->price , null , '٬')}}</span>
                                            @else
                                                <span class="price current-price">{{number_format($offer->price , null , '٬')}} تومان </span>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Flash Sale Area  -->

    <!-- Start Categorie Area  -->
    <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
        <div class="container">
            <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> دسته بندی
                        ها</span>
                <h2 class="title">جستوجو بر اساس دسته بندی</h2>
            </div>
            <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @foreach($categories as $category)
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                            <a href="{{route('pages.product_category' , $category->slug)}}">
                                <img class="img-fluid" src="{{asset('/storage/category_images/' . $category->image)}}"
                                     alt="product categorie">
                                <h6 class="cat-title">{{$category->name}}</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                @endforeach
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid" src="assets/images/product/categories/elec-4.png"
                                     alt="product categorie">
                                <h6 class="cat-title">گوشی هوشمند</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
            </div>
        </div>
    </div>
    <!-- End Categorie Area  -->

    <!-- Poster Countdown Area  -->
    <div class="axil-poster-countdown">
        <div class="container">
            <div class="poster-countdown-wrap bg-lighter">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="poster-countdown-content">
                            <div class="section-title-wrapper">
                                    <span class="title-highlighter highlighter-secondary"> <i
                                            class="fal fa-headphones-alt"></i> از دست ندهید !!</span>
                                <h2 class="title">تجربه گوش دادن به موسیقی را بهبود بدهید</h2>
                            </div>
{{--                            <div class="poster-countdown countdown mb--40"></div>--}}
                            <a href="#" class="axil-btn btn-bg-primary">بررسی و خرید</a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="poster-countdown-thumbnail">
                            <img src="assets/images/product/poster/poster-03.png" alt="Poster Product">
                            <div class="music-singnal">
                                <div class="item-circle circle-1"></div>
                                <div class="item-circle circle-2"></div>
                                <div class="item-circle circle-3"></div>
                                <div class="item-circle circle-4"></div>
                                <div class="item-circle circle-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Poster Countdown Area  -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="fal fa-store"></i> محصولات ما</span>
                <h2 class="title">محصولات ما جدید</h2>
            </div>
            <div
                class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        @foreach($products as $product)
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="{{route('page.single_product' , $product->slug)}}">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                 class="main-img" src="{{asset('/storage/product_images/' . $product->image)}}"
                                                 alt="{{$product->title}}">
                                        </a>
                                        @if($product->discount)
                                            <div class="label-block label-right">
                                                <div class="product-badget">{{$product->discount}}% تخفیف</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="{{route('page.single_product' , $product->slug)}}">{{$product->title}}</a></h5>
                                            <div class="product-price-variant">
                                                @if($product->discount)
                                                    <span class="price current-price">{{number_format($product->price - ($product->price * $product->discount / 100) , null , '٬')}} تومان </span>
                                                    <span
                                                        class="price old-price">{{number_format($product->price , null , '٬')}}</span>
                                                @else
                                                    <span class="price current-price">{{number_format($product->price , null , '٬')}} تومان </span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="{{route('page.products')}}" class="axil-btn btn-bg-lighter btn-load-more">نمایش تمام محصولات</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Expolre Product Area  -->

    <!-- Start Related Blog Area  -->
    <div class="related-blog-area bg-color-white pb--60 pb_sm--40 mt--40">
        <div class="container">
            <div class="section-title-wrapper mb--70 mb_sm--40 pr--110">
                <span class="title-highlighter highlighter-primary mb--10"> <i class="fal fa-bell"></i>وبلاگ</span>
                <h3 class="mb--25">پست های وبلاگ</h3>
            </div>
            <div class="related-blog-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @foreach($articles as $article)
                    <div class="slick-single-layout">
                        <div class="content-blog">
                            <div class="inner">
                                <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                    <!-- Start Single Thumb  -->
                                    <div class="thumbnail">
                                        <a href="{{route('page.single_article' , $article->slug)}}">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" src="{{asset('/storage/article_images/' . $article->image)}}" alt="{{$article->title}}">
                                        </a>
                                    </div>
                                    <!-- End Single Thumb  -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="{{route('page.single_article' , $article->slug)}}">{{$article->title}}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Related Blog Area  -->

    <!-- Start Axil Newsletter Area  -->
    @include('layouts.news_letter')
    <!-- End Axil Newsletter Area  -->

@endsection
