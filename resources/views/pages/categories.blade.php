@extends('layouts.master')


@section('content')
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{route('page.index')}}">خانه</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">دسته بندی ها</li>
                        </ul>
                        <h1 class="title">تمامی دسته بندی ها</h1>

                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="assets/images/product/product-45.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-area mt--40 mb--40">
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                @foreach($categories as $category)
                    <div class="col">
                        <a href="{{route('pages.product_category' , $category->slug)}}">
                            <div class="service-box">
                                <div class="icon">
                                    <img src="{{asset('/storage/category_images/' . $category->image)}}" class="img-fluid" alt="Service">
                                </div>
                                <h6 class="title">{{$category->name}}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
