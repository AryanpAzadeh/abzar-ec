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
                            <li class="axil-breadcrumb-item active" aria-current="page"><a href="{{route('page.products')}}">محصولات</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">دسته بندی : {{$category->name}}</li>
                        </ul>
                        <h1 class="title">تمامی محصولات</h1>

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

    <div class="axil-categorie-area pt--30 bg-color-white">
        <div class="container">
            <div class="categrie-product-activation-2 categorie-product-two slick-layout-wrapper--15">
               @foreach($category->subcategory()->get() as $sc)
                    <div class="slick-single-layout slick-slide">
                        <div class="categrie-product-2">
                            <a href="{{route('pages.product_sub_category' , $sc->slug)}}">
                                <img class="img-fluid" src="{{asset('/storage/sub_category_images/' . $sc->image)}}"
                                     alt="product categorie">
                                <h6 class="cat-title">{{$sc->name}}</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>

               @endforeach

            </div>
        </div>
    </div>

    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <form action="{{route('search_product')}}" method="get">
                        <div class="axil-shop-sidebar">
                            <div class="d-lg-none">
                                <button type="button" class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                            </div>

                            <div class="toggle-list product-categories active">
                                <h6 class="title">دسته بندی ها</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>

                                                <input   {{in_array($category->id,$cat) ? 'checked' : ''}} type="checkbox" value="{{$category->id}}"
                                                         id="radio-{{$category->id}}" name="cat[]">
                                                <label for="radio-{{$category->id}}">{{$category->name}}</label>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                            <div class="toggle-list product-categories active">
                                <h6 class="title">زیر دسته بندی ها</h6>
                                <div class="shop-submenu">
                                    <div class="text-center" id="load-sub-cat">
                                        <div class="spinner-border text-dark" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <ul id="sub-cats">
                                        @foreach($sub_categories as $sub)
                                            <li class="subs">

                                                <input  {{in_array($sub->id,$sub_cat) ? 'checked' : ''}} type="checkbox" value="{{$sub->id}}"
                                                        id="radio-sub-{{$sub->id}}" name="sub_cat[]">
                                                <label for="radio-sub-{{$sub->id}}">{{$sub->name}}</label>
                                            </li>
                                        @endforeach



                                    </ul>
                                </div>
                            </div>
                            <div class="toggle-list product-categories product-gender active">
                                <h6 class="title">برند ها</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        @foreach($brands as $brand)
                                            <li >
                                                <input {{in_array($brand->id,$bra) ? 'checked' : ''}} type="checkbox" value="{{$brand->id}}" id="radio-brand-{{$brand->id}}"
                                                       name="brand[]">
                                                <label for="radio-brand-{{$brand->id}}">{{$brand->name}}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            {{--                            <div class="toggle-list product-price-range">--}}
                            {{--                                <h6 class="title">قیمت</h6>--}}
                            {{--                                <div class="shop-submenu">--}}
                            {{--                                    <ul>--}}

                            {{--                                    </ul>--}}
                            {{--                                    <form action="#" class="mt--25">--}}
                            {{--                                        <div id="slider-range"></div>--}}
                            {{--                                        <div class="flex-center mt--20">--}}
                            {{--                                            <span class="input-range">قیمت: </span>--}}
                            {{--                                            <input type="text" id="amount" name="price" class="amount-range" readonly>--}}
                            {{--                                        </div>--}}
                            {{--                                    </form>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <button type="submit" class="axil-btn btn-bg-primary">فیلتر کن</button>
                        </div>
                    </form>

                    <!-- End .axil-shop-sidebar -->
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-shop-top mb--40">
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle"><i
                                            class="fas fa-filter"></i> فیلتر
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                    <div class="row row--15" id="pro">
                        @if($products->isEmpty())
                            <h4 class="text-center">محصولی برای نمایش وجود ندارد !</h4>

                        @endif
                        @foreach($products as $product)
                            <div class="col-xl-4 col-lg-4 col-sm-6 first">
                                <div class="axil-product product-style-one has-color-pick mt--40">
                                    <div class="thumbnail">
                                        <a href="{{route('page.single_product' , $product->slug)}}">
                                            <img src="{{asset('/storage/product_images/' . $product->image)}}"
                                                 alt="Product Images">
                                        </a>
                                        @if($product->discount)
                                            <div class="label-block label-right">
                                                <div class="product-badget">{{$product->discount}}% تخفیف</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a
                                                    href="{{route('page.single_product' , $product->slug)}}">{{$product->title}}</a>
                                            </h5>
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
                    <div class="text-center pt--20">
                        <div class="post-pagination">
                            {{$products->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->

    <!-- Start Axil Newsletter Area  -->
    @include('layouts.news_letter')
    <!-- End Axil Newsletter Area  -->
@endsection


{{--@section('script')--}}
{{--    <script>--}}
{{--       function filter (){--}}
{{--           cats = []; // reset--}}
{{--           $(".subs").remove();--}}
{{--           $('input[name="cat[]"]:checked').each(function()--}}
{{--           {--}}
{{--               cats.push($(this).val());--}}

{{--               $.ajax({--}}
{{--                   url: 'product/search/',--}}
{{--                   datatype: "html",--}}
{{--                   type: "post",--}}
{{--                   data:{--}}
{{--                       "cats": cats,--}}
{{--                       "_token": "{{ csrf_token() }}",--}}
{{--                   },--}}
{{--                   success: function (response) {--}}
{{--                       // alert('ssss');--}}


{{--                       $("#sub-cats").html(response);--}}


{{--                   },--}}
{{--                   error: function(request,status,errorThrown) {--}}
{{--                       alert(errorThrown)--}}
{{--                   }--}}
{{--               })--}}
{{--           });--}}
{{--       }--}}
{{--    </script>--}}
{{--@endsection--}}

@section('script')
    <script>
        $(document).ready(function () {
            $('#load-sub-cat').hide();
            $('input[name="cat[]"]').on('change', function (e) {

                e.preventDefault();
                cats = []; // reset
                sub_cat = {!! json_encode( (array)$sub_cat) !!}; // reset

                $(".subs").remove();

                // if ($('input[name="cat[]"]:checked').length < 1)
                // {
                //
                // }

                $('input[name="cat[]"]:checked').each(function()
                {
                    cats.push($(this).val());

                    $.ajax({
                        url: '/get/sub-categories',
                        datatype: "html",
                        type: "post",
                        data:{
                            "cats": cats,
                            "sub_cat" : sub_cat,
                            "_token": "{{ csrf_token() }}",
                        },
                        beforeSend: function () {
                            $('#load-sub-cat').show();
                        },
                        success: function (response) {
                            // alert('ssss');

                            $('#load-sub-cat').hide();
                            $("#sub-cats").html(response);



                        },
                        error: function(request,status,errorThrown) {
                            alert(errorThrown + ' ' + status + ' ' + request)
                        }
                    })
                });


            });

        });
    </script>

    {{--        --}}{{--$(document).ready(function () {--}}

    {{--        --}}{{--    var categories = [];--}}
    {{--        --}}{{--    var csrf_token = @csrf;--}}

    {{--        --}}{{--    // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels--}}
    {{--        --}}{{--    $('input[name="cat[]"]').on('change', function (e) {--}}

    {{--        --}}{{--        e.preventDefault();--}}
    {{--        --}}{{--        categories = []; // reset--}}

    {{--        --}}{{--        $('input[name="cat[]"]:checked').each(function()--}}
    {{--        --}}{{--        {--}}
    {{--        --}}{{--            categories.push($(this).val());--}}
    {{--        --}}{{--        });--}}

    {{--        --}}{{--        $.post('/product/search', {categories: categories , _token :  csrf_token() }, function(markup)--}}
    {{--        --}}{{--        {--}}
    {{--        --}}{{--            $('#pro').html(markup);--}}
    {{--        --}}{{--        });--}}

    {{--        --}}{{--    });--}}

    {{--        --}}{{--});--}}
    {{--    </script>--}}
@endsection
