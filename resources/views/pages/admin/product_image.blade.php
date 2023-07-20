@extends('layouts.admin.master')
@section('title' , 'مورد جدید')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/css/ui/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/css/plugins/file-uploaders/dropzone.css')}}">
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">افزودن تصویر</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.products')}}">محصول : {{$product->title}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">تصویر جدید
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body"><!-- Dropzone section start -->
                <section id="dropzone-examples">
                    <!-- multi file upload starts -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">آپلود تصویر برای محصول : {{$product->title}} </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{route('product.images.store')}}" method="post" class="dropzone dropzone-area" id="dpz-multiple-files" enctype="multipart/form-data">
                                            @csrf
                                            <div class="dz-message">تصاویر خود را برای ارسال به اینجا بکشید و یا اینجا کلیک کنید</div>
                                            <input type="hidden" value="{{$product->id}}" name="product_id">
                                            {{--                                                                                        <button type="submit">submit</button>--}}
                                            {{--                                                                                        <input type="file" name="file" id="">--}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- multi file upload ends -->
                </section>
                <!-- // Dropzone section end -->
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class=" card-header">
                                    <h4 class="card-title">تصاویر </h4>
                                    <a href="{{route('admin.products')}}"
                                       class="btn btn-primary glow mr-1 mb-1 float-right"><i
                                            class="bx bxs-add-to-queue"></i>
                                        <span class="align-middle ml-25"> بازگشت به لیست محصولات</span></a>
                                    <a href="javascript:window.location.reload(true)"
                                       class="btn btn-primary glow mr-1 mb-1 float-right"><i
                                            class="bx bx-reset"></i>
                                        <span class="align-middle ml-25"> تازه سازی لیست</span></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    {{--                                                    <th>عنوان</th>--}}
                                                    <th>تصویر</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($images as $image)
                                                    <tr>
                                                        {{--                                                        <td>{{$image->name}}</td>--}}
                                                        <td><img src="/storage/product_images/uploads/{{$image->image}}" class="mr-50"
                                                                 alt="card" height="50" width="50"></td>
                                                        <td>
                                                            <a data-target="#delete-{{$image->id}}"
                                                               class="btn btn-icon btn-light-danger mr-1 mb-1 pointer"
                                                               data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade text-left" id="delete-{{$image->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
                                                         aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h5 class="modal-title white" id="myModalLabel120">
                                                                        حذف</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body line-height-2">
                                                                    آیا از حذف این مورد اطمینان دارید ؟
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-light-secondary"
                                                                            data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">بستن</span>
                                                                    </button>
                                                                    <form action="{{route('product.images.delete' , $image->id)}}"
                                                                          method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                                class="btn btn-danger ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">حذف</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection


@section('script')
    <script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/ui/prism.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/extensions/dropzone.js')}}"></script>
@endsection
