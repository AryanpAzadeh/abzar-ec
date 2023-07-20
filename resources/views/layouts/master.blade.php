<!doctype html>
<html class="no-js" lang="fa">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ابزار</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.styles')
    @yield('style')

</head>


<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->
<a href="#top" class="back-to-top" id="backto-top">
    <lord-icon
        src="https://cdn.lordicon.com/xsdtfyne.json"
        trigger="hover"
        colors="primary:#ffffff"
        style="width:30px;height:40px">
    </lord-icon>
</a>
<!-- Start Header -->
@include('layouts.navbar')

<main class="main-wrapper">

    @yield('content')

</main>

@include('layouts.footer')
<div class="header-search-modal" id="header-search-modal">
    <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
    <div class="header-search-wrap">
        <div class="card-header">
            <form action="{{route('pages.search')}}" method="get">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" id="prod-search"
                           placeholder="بنویسید ...">
                    <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- JS
============================================ -->
@include('layouts.scripts')
@yield('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))

    swal({
        timer: 2000,
        timerProgressBar: true,
        text: "{{session('success')}}",
        icon: "success",
        button: "باشه",
    });
    @endif

    @if(\Illuminate\Support\Facades\Session::has('error'))

    swal({
        timer: 4000,
        timerProgressBar: true,
        text: "{{session('error')}}",
        icon: "error",
        button: "باشه",
    });
    @endif


    @if(count($errors))
    swal({
        timer: 2000,
        timerProgressBar: true,
        text: "{{$errors->first()}}",
        icon: "error",
        button: "متوجه شدم",
    });
    @endif
</script>


</body>


</html>
