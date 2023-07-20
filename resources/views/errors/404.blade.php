@extends('layouts.master')

@section('content')
    <section class="error-page onepage-screen-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <span class="title-highlighter highlighter-secondary"> <i class="fal fa-exclamation-circle"></i>
                            به نظر میاد گم شدید !</span>
                        <h1 class="title">صفحه پیدا نشد</h1>
                        <p>به نظر میاد صفحه ای که به دنبالش بودید رو پیدا نکردیم. یا وجود ندارد و یا پاک شده است</p>
                        <a href="{{route('page.index')}}" class="axil-btn btn-bg-secondary right-icon">بازگشت به صفحه اصلی <i
                                class="fal fa-long-arrow-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                        <img src="{{asset('/assets/images/others/404.png')}}" alt="404">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
