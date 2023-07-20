@extends('layouts.master')
@section('style')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

    <script type="application/ld+json">
{
	"@context": "http://schema.org/",
	"@type": "BlogPosting",
	"mainEntityOfPage": {
		"@type": "WebPage",
		"@id": "{{route('page.single_article' , $article->slug)}}"
	},
	"author": {
		"@type": "Organization",
		"name": "IDesign Studio"
	},
	"publisher": {
		"@type": "Organization",
		"name": "IDesign Studio",

	},
	"headline": "{{$article->title}}",
	"image": "{{asset('/storage/article_images/' . $article->image)}}",
	"datePublished": "{{$article->created_at}}",
	"dateModified": "{{$article->updated_at}}"
}
</script>
@endsection
@section('content')
    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">
        <div class="axil-single-post post-formate post-standard">
            <div class="container">
                <div class="content-block">
                    <div class="inner">
                        <div class="post-thumbnail">
                            <img src="{{asset('/storage/article_images/' . $article->image)}}" alt="{{$article->image}}">
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                </div>
                <!-- End .content-blog -->
            </div>
        </div>
        <!-- End .single-post -->
        <div class="post-single-wrapper position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="d-flex flex-wrap align-content-start h-100">
                            <div class="position-sticky sticky-top">
                                <div class="post-details__social-share">
                                    <span class="share-on-text">اشتراک در:</span>
                                    <div class="social-share">
                                        <a href="https://www.facebook.com/sharer.php?u={{route('page.single_article' , $article->slug)}}"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/intent/tweet"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle/?mini=true&url={{route('page.single_article' , $article->slug)}}"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://telegram.me/share/url?url={{route('page.single_article' , $article->slug)}}"><i class="fab fa-telegram"></i></a>
                                        <a href="https://web.whatsapp.com/send?text={{route('page.single_article' , $article->slug)}}"><i class="fab fa-whatsapp"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 axil-post-wrapper">
                        <div class="post-heading">
                            <h1 class="title">{{$article->title}}</h1>
                            <div class="axil-post-meta">

                                <div class="post-meta-content">
                                    <ul class="post-meta-list">
                                        <li>{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%d %B  %Y')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {!! $article->body !!}

                        <div class="axil-comment-area mt--25">
                            <h4 class="title">{{$comments->count()}} نظر</h4>
                            <ul class="comment-list">
                                <!-- Start Single Comment  -->
                                @foreach($comments as $comment)
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-inner">
                                                    <h6 class="commenter">
                                                        <p class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="{{$comment->name}}">{{$comment->name}}</span>
                                                            </span>
                                                        </p>
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

                        <!-- Start Comment Respond  -->
                        <div class="comment-respond">
                            <h4 class="title">نظر شما</h4>
                            <form action="{{route('comment.article.store' , $article->id)}}" method="post">
                                @csrf
                                <p class="comment-notes"><span id="email-notes">آدرس ایمیل شما منتشر نخواهد
                                            شد.</span></p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>نظر شما</label>
                                            <textarea name="comment" placeholder="بنویسید ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>نام <span>*</span></label>
                                            <input id="name" name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>ایمیل <span>*</span> </label>
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
                                                    class="axil-btn btn-bg-primary w-auto">ارسال نظر</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Comment Respond  -->
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
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->

    <!-- Start Related Blog Area  -->
    <div class="related-blog-area bg-color-white pb--60 pb_sm--40">
        <div class="container">
            <div class="section-title-wrapper mb--70 mb_sm--40 pr--110">
                <span class="title-highlighter highlighter-primary mb--10"> <i class="fal fa-bell"></i>وبلاگ</span>
                <h3 class="mb--25">پست های مرتبط</h3>
            </div>
            <div class="related-blog-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @foreach(\App\Models\Article::where([['id' , '!=' , $article->id] , ['category_id' , $article->category_id]])->inRandomOrder()->take(4)->get() as $aa)
                    <div class="slick-single-layout">
                        <div class="content-blog">
                            <div class="inner">
                                <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                    <!-- Start Single Thumb  -->
                                    <div class="thumbnail">
                                        <a href="{{route('page.single_article' , $aa->slug)}}">
                                            <img src="{{asset('/storage/article_images/' . $aa->image)}}" alt="{{$aa->title}}">
                                        </a>
                                    </div>
                                    <!-- End Single Thumb  -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="{{route('page.single_article' , $aa->slug)}}">{{$aa->title}}</a></h5>
                                    <div class="axil-post-meta">
                                        <div class="post-meta-content">
                                            <ul class="post-meta-list">
                                                <li>{{\Hekmatinasser\Verta\Verta::instance($aa->created_at)->format('%d %B  %Y')}}</li>
                                            </ul>
                                        </div>
                                    </div>
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
