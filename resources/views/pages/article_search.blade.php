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
                            <li class="axil-breadcrumb-item" aria-current="page"><a href="{{route('pages.articles')}}">وبلاگ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">جستوجو : {{$s}}</li>
                        </ul>
                        <h1 class="title">وبلاگ - {{$s}}</h1>
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
    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">
        <div class="container">
            <div class="row row--25">
                <div class="col-lg-8 axil-post-wrapper">
                    @if($articles->isEmpty())
                        <h4 class="text-center">مقاله ای برای نمایش وجود ندارد !</h4>

                    @endif
                    @foreach($articles as $article)
                        <!-- Start Single Blog  -->
                        <div class="content-blog mt--60">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{route('page.single_article' , $article->slug)}}">
                                        <img src="{{asset('/storage/article_images/' . $article->image)}}" alt="{{$article->title}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="{{route('page.single_article' , $article->slug)}}">{{$article->title}}</a></h4>
                                    <div class="axil-post-meta">

                                        <div class="post-meta-content">
                                            <ul class="post-meta-list">
                                                <li>{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%d %B  %Y')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>{{$article->sub_title}}</p>
                                    <div class="read-more-btn">
                                        <a class="axil-btn btn-bg-primary" href="{{route('page.single_article' , $article->slug)}}">بیشتر بخوانید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog  -->
                    @endforeach

                </div>
                <div class="col-lg-4">
                    <!-- Start Sidebar Area  -->
                    <aside class="axil-sidebar-area">

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget mt--40">
                            <h6 class="widget-title">آخرین پست ها</h6>
                            @foreach(\App\Models\Article::inRandomOrder()->take(3)->get() as $ar)
                                <!-- Start Single Post List  -->
                                <div class="content-blog post-list-view mb--20">
                                    <div class="thumbnail">
                                        <a href="{{route('page.single_article' , $ar->slug)}}">
                                            <img src="{{asset('/storage/article_images/' . $ar->image)}}" alt="{{$ar->title}}">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{route('page.single_article' , $ar->slug)}}">{{$ar->title}}
                                            </a></h6>
                                        <div class="axil-post-meta">
                                            <div class="post-meta-content">
                                                <ul class="post-meta-list">
                                                    <li>{{\Hekmatinasser\Verta\Verta::instance($ar->created_at)->format('%d %B  %Y')}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Post List  -->
                            @endforeach


                        </div>
                        <!-- End Single Widget  -->
                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget mt--40">
                            <h6 class="widget-title">محصولات پر بازدید</h6>
                            <ul class="product_list_widget recent-viewed-product">
                                <!-- Start Single product_list  -->
                                @foreach(\App\Models\Product::inRandomOrder()->take(3)->get() as $pro)
                                    <li>
                                        <div class="thumbnail">
                                            <a href="{{route('page.single_product' , $pro->slug)}}">
                                                <img src="{{asset('/storage/product_images/' . $pro->image)}}" alt="{{$pro->title}}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="{{route('page.single_product' , $pro->slug)}}">{{$pro->title}}</a></h6>
                                            <div class="product-meta-content">
                                                <span class="woocommerce-Price-amount amount">
                                                    @if($pro->discount)
                                                        <del>{{number_format($pro->price , null , '٬')}}</del>
                                                        {{number_format($pro->price - ($pro->price * $pro->discount / 100) , null , '٬')}} تومان
                                                    @else
                                                        <span class="price current-price">{{number_format($pro->price , null , '٬')}} تومان </span>

                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <!-- End Single product_list  -->
                            </ul>

                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget mt--40 widget_search">
                            <h6 class="widget-title">جستوجو</h6>
                            <form class="blog-search" action="{{route('pages.search.article')}}" method="get">
                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                <input name="s" type="text" placeholder="جستوجو ...">
                            </form>
                        </div>
                        <!-- End Single Widget  -->


                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget mt--40 widget_tag_cloud">
                            <h6 class="widget-title">دسته بندی ها</h6>
                            <div class="tagcloud">
                                @foreach($categories as $category)
                                    <a href="{{route('page.single_article_category' , $category->slug)}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Single Widget  -->

                    </aside>
                    <!-- End Sidebar Area -->
                </div>
            </div>
            <div class="post-pagination">
                {{$articles->links()}}
            </div>
            <!-- End post-pagination -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End Blog Area  -->

    @include('layouts.news_letter')

@endsection
