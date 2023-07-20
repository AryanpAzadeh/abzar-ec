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
                            <li class="axil-breadcrumb-item active" aria-current="page">تخفیف</li>
                        </ul>
                        <h1 class="title">{{$coupon->name}}</h1>
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

    <!-- Start Privacy Policy Area  -->
    <div class="axil-privacy-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="axil-privacy-policy">
                        <span class="policy-published">کد تخفیف : {{$coupon->code}}</span>
                        {!! $coupon->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Privacy Policy Area  -->
@endsection
