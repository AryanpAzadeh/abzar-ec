@extends('layouts.master')
@section('style')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

@endsection
@section('content')
    <!-- Start Shop Area  -->
    <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
        <div class="single-product-thumb mb--40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb--40">
                        <div class="row">
                            <div class="col-lg-10 order-lg-2">
                                <div class="single-product-thumbnail-wrap zoom-gallery">
                                    <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                        @foreach($product->images()->orderBy('id' , 'desc')->get() as $pro_image)
                                            <div class="thumbnail">
                                                <a href="{{asset('/storage/product_images/uploads/' . $pro_image->image)}}" class="popup-zoom">
                                                    <img src="{{asset('/storage/product_images/uploads/' . $pro_image->image)}}"
                                                         alt="Product Images">
                                                </a>
                                            </div>
                                        @endforeach

                                        <div class="thumbnail">
                                            <a href="{{asset('/storage/product_images/' . $product->image)}}" class="popup-zoom">
                                                <img src="{{asset('/storage/product_images/' . $product->image)}}"
                                                     alt="Product Images">
                                            </a>
                                        </div>
                                    </div>
                                    @if($product->discount)
                                        <div class="label-block">
                                            <div class="product-badget">{{$product->discount}}% تخفیف</div>
                                        </div>
                                    @endif
                                    <div class="product-quick-view position-view">
                                        <a href="{{asset('/storage/product_images/' . $product->image)}}" class="popup-zoom">
                                            <i class="far fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 order-lg-1">
                                <div class="product-small-thumb-3 small-thumb-wrapper">
                                    <div class="small-thumb-img">
                                        <img src="{{asset('/storage/product_images/' . $product->image)}}"
                                             alt="thumb image">
                                    </div>
                                    @foreach($product->images()->get() as $pro_image)
                                        <div class="small-thumb-img">
                                            <img src="{{asset('/storage/product_images/uploads/' . $pro_image->image)}}"
                                                 alt="thumb image">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h1 class="product-title">{{$product->title}}</h1>
                                <div class="product-rating">
                                   @if($comments->count() > 0)
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                   @endif
                                    <div class="review-link">
                                        <a href="#">(<span>{{$comments->count()}}</span> نظر)</a>
                                    </div>
                                </div>

                            @if($product->discount)
                                    <span class="price-amount">{{number_format($product->price - ($product->price * $product->discount / 100) , null , '٬')}} تومان </span>
                                    <span class="price-amount" style="text-decoration: line-through">{{number_format($product->price , null , '٬')}} تومان </span>
                                @else
                                    <span class="price-amount">{{number_format($product->price , null , '٬')}} تومان </span>

                                @endif
                                <ul class="product-meta">
                                    <li><i class="fa fa-minus"></i>دسته بندی : <a href="{{route('pages.product_category' , $product->category->slug)}}">{{$product->category->name}}</a></li>
                                    <li><i class="fa fa-minus"></i>برند : <a href="{{route('pages.product_brand' , $product->brand->slug)}}">{{$product->brand->name}}</a></li>
                                </ul>
                                <p class="description">{{$product->short_description}}</p>

                                <!-- Start Product Action Wrapper  -->
                                <div class="product-action-wrapper d-flex-center">
                                    <form action="{{route('cart.add' , $product->id)}}" method="get" id="add_cart">
                                    <!-- Start Quentity Action  -->
                                    <div class="pro-qty"><input type="number" name="quantity" value="1" min="1"></div>
                                    <!-- End Quentity Action  -->
                                    </form>

                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        <li class="add-to-cart"><a href="{{route('cart.add' , $product->id)}}" onclick="event.preventDefault();
                                                document.getElementById('add_cart').submit();"
                                                                   class="axil-btn btn-bg-primary">اضافه به سبد خرید</a></li>
                                       @auth()
                                            @if(auth()->user()->hasModelOnList($product) != null)

                                                <li class="wishlist"><a href="{{route('remove.wishlist' , $product->id)}}"
                                                                        class="axil-btn wishlist-btn bg-color-primary border-primary"><i class="far fa-heart text-white"></i></a></li>
                                            @else

                                                <li class="wishlist"><a href="{{route('add.wishlist' , $product->id)}}"
                                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                            @endif
                                       @endauth
                                    </ul>
                                    <!-- End Product Action  -->

                                </div>
                                <!-- End Product Action Wrapper  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->

        <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
            <div class="container">
                <ul class="nav tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                           aria-controls="description" aria-selected="true">توضیحات</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a  id="description-tab" data-bs-toggle="tab" href="#ad_description" role="tab"
                           aria-controls="description" aria-selected="true">بررسی تخصصی</a>
                    </li>
                    <li class="nav-item " role="presentation">
                        <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab"
                           aria-controls="additional-info" aria-selected="false">مشخصات</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                           aria-selected="false">نظرات</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                         aria-labelledby="description-tab">
                        <div class="product-desc-wrapper">
                            <div class="row">
                                <div class="col-lg-12 mb--30">
                                    <div class="single-desc">
                                        {!! $product->description !!}
                                    </div>
                                </div>

                            </div>
                            <!-- End .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="pro-des-features">
                                        <li class="single-features">
                                            <div class="icon">
                                                <img src="/assets/images/product/product-thumb/icon-3.png"
                                                     alt="icon">
                                            </div>
                                            مهلت تست
                                        </li>
                                        <li class="single-features">
                                            <div class="icon">
                                                <img src="/assets/images/product/product-thumb/icon-2.png"
                                                     alt="icon">
                                            </div>
                                            تضمین کیفیت
                                        </li>
                                        <li class="single-features">
                                            <div class="icon">
                                                <img src="/assets/images/product/product-thumb/icon-1.png"
                                                     alt="icon">
                                            </div>
                                            محصول اورجینال
                                        </li>
                                    </ul>
                                    <!-- End .pro-des-features -->
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-desc-wrapper -->
                    </div>
                    <div class="tab-pane fade " id="ad_description" role="tabpanel"
                         aria-labelledby="description-tab">
                        <div class="product-desc-wrapper">
                            <div class="row">
                                <div class="col-lg-12 mb--30">
                                    <div class="single-desc">
                                        {!! $product->complete_description !!}
                                    </div>
                                </div>
                                <!-- End .col-lg-6 -->

                            </div>
                        </div>
                        <!-- End .product-desc-wrapper -->
                    </div>

                    <div class="tab-pane fade" id="additional-info" role="tabpanel"
                         aria-labelledby="additional-info-tab">
                        <div class="product-additional-info">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                    @foreach($product->features as $feature)
                                        <tr>
                                            <th>{{$feature['f_title']}}</th>
                                            <td>{{$feature['f_value']}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="reviews-wrapper">
                            <div class="row">
                                <div class="col-lg-6 mb--40">
                                    <div class="axil-comment-area pro-desc-commnet-area">
                                        <h5 class="title">{{$comments->count()}} نظر برای این محصول</h5>
                                        <ul class="comment-list">
                                            <!-- Start Single Comment  -->
                                            @foreach($comments as $comment)
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Cameron Williamson">{{$comment->name}}</span>
                                                                        </span>
                                                                    </a>
                                                                </h6>
                                                                <div class="comment-meta">
                                                                    <div class="time-spent">{{verta($comment->created_at)->format('%d %B %Y , H:i')}}</div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    <p>{{$comment->comment}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <!-- End Single Comment  -->
                                        </ul>
                                    </div>
                                    <!-- End .axil-commnet-area -->
                                </div>
                                <!-- End .col -->
                                <div class="col-lg-6 mb--40">
                                    <!-- Start Comment Respond  -->
                                    <div class="comment-respond pro-des-commend-respond mt--0">
                                        <h5 class="title mb--30">نظر شما</h5>
                                        <p>آدرس ایمیل شما منتشر نخواهد شد.زمینه های مورد نیاز مشخص شده اند *</p>
                                        <form action="{{route('comment.product.store' , $product->id)}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>نظر شما</label>
                                                        <textarea name="comment"
                                                                  placeholder="نظر خود را بنویسید ..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>نام <span class="require">*</span></label>
                                                        <input id="name" name="name" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>ایمیل <span class="require">*</span> </label>
                                                        <input id="email" name="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-12">
                                                    <div class="form-group">
                                                        {!! htmlFormSnippet() !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-submit">
                                                        <button type="submit" id="submit"
                                                                class="axil-btn btn-bg-primary w-auto">ثبت نظر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Comment Respond  -->
                                </div>
                                <!-- End .col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- woocommerce-tabs -->

    </div>
    <!-- End Shop Area  -->

    <!-- Start Recently Viewed Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
        <div class="container">
            <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                        مرتبط</span>
                <h2 class="title">محصولات مرتبط</h2>
            </div>
            <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                @foreach(\App\Models\Product::where([['id' , '!=' , $product->id] , ['category_id' , $product->category_id]])->inRandomOrder()->take(8)->get() as $pro)
                    <div class="slick-single-layout">
                        <div class="axil-product">
                            <div class="thumbnail">
                                <a href="{{route('page.single_product' , $pro->slug)}}">
                                    <img src="{{asset('/storage/product_images/' . $pro->image)}}" alt="{{$pro->title}}">
                                </a>
                                @if($pro->discount)
                                    <div class="label-block label-right">
                                        <div class="product-badget">{{$pro->discount}}% تخفیف</div>
                                    </div>
                                @endif
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('page.single_product' , $pro->slug)}}">{{$pro->title}}</a></h5>
                                    <div class="product-price-variant">
                                        @if($pro->discount)
                                            <span class="price current-price">{{number_format($pro->price - ($pro->price * $pro->discount / 100) , null , '٬')}} تومان </span>
                                            <span
                                                class="price old-price">{{number_format($pro->price , null , '٬')}}</span>
                                        @else
                                            <span class="price current-price">{{number_format($pro->price , null , '٬')}} تومان </span>

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
    <!-- End Recently Viewed Product Area  -->
    <!-- Start Axil Newsletter Area  -->
    @include('layouts.news_letter')
    <!-- End Axil Newsletter Area  -->
@endsection
