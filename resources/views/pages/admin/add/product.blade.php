@extends('layouts.admin.master')
@section('title' , 'محصول جدید')
@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/css/forms/select/select2.min.css')}}">
    <script src="https://cdn.tiny.cloud/1/9njwd67ym0oy1io26pq5lc67g5zal48do214cjf8afan4l27/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
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
                            <h5 class="content-header-title float-left pr-1">محصولات</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.products')}}">محصولات </a>
                                    </li>
                                    <li class="breadcrumb-item active">مورد جدید
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Inputs Groups start -->
                <section id="basic-input-groups">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اضافه کردن محصول جدید</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{route('product.store')}}" method="post"
                                              enctype="multipart/form-data"
                                              class="form repeater-default">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6>عنوان</h6>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" name="title" class="form-control"
                                                               id="iconLeft1"
                                                               placeholder="عنوان محصول" required
                                                               oninvalid="setCustomValidity('لطفا عنوان را وارد کنید.')"
                                                               onkeyup="setCustomValidity('')" value="{{old('title')}}">
                                                        <div class="form-control-position">
                                                            <i class="bx bx-pencil"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>توضیحات کوتاه</h6>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" name="short_description" class="form-control"
                                                               id="iconLeft1"
                                                               placeholder="توضیحات اجمالی محصول" required
                                                               oninvalid="setCustomValidity('لطفا توضیحات کوتاه را وارد کنید.')"
                                                               onkeyup="setCustomValidity('')"
                                                               value="{{old('sub_title')}}">
                                                        <div class="form-control-position">
                                                            <i class="bx bx-pencil"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>قیمت ( تومان )</h6>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="number" name="price" class="form-control"
                                                               id="iconLeft1"
                                                               placeholder="قیمت محصول را وارد کنید" required
                                                               oninvalid="setCustomValidity('لطفا قیمت را وارد کنید.')"
                                                               onkeyup="setCustomValidity('')" value="{{old('price')}}">
                                                        <div class="form-control-position">
                                                            <i class="bx bx-money"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>تخفیف ( درصد )</h6>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" name="discount" class="form-control"
                                                               id="iconLeft1"
                                                               placeholder="20"
                                                               value="{{old('discount')}}">
                                                        <div class="form-control-position">
                                                            <i class="bx bxs-discount"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>دسته بندی</h6>
                                                    <div class="form-group">
                                                        <select class="select2 form-control" name="category_id" required id="category">
                                                            <option
                                                                value="{{null}}"> دسته بندی را انتخاب کنید</option>
                                                            @foreach(\App\Models\Category::all() as $category)
                                                                <option
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>زیر دسته بندی</h6>
                                                    <div class="form-group">
                                                        <select class="select2 form-control" name="sub_category_id" id="sub_category">

                                                                <option
                                                                    value="{{null}}">زیر دسته بندی را انتخاب کنید</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>برند</h6>
                                                    <div class="form-group">
                                                        <select class="select2 form-control" name="brand_id">

                                                            @foreach(\App\Models\Brand::all() as $brand)
                                                                <option
                                                                    value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">

                                                    <div id="full-wrapper">
                                                        <div id="full-container">
                                                            <textarea name="description" class="text-right" id="editor" placeholder="معرفی محصول"
                                                                      cols="20"
                                                                      rows="20"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="col-sm-12">

                                                    <div id="full-wrapper">
                                                        <div id="full-container">
                                                            <textarea name="complete_description" class="text-right" id="editor" placeholder="معرفی تخصصی محصول"
                                                                      cols="20"
                                                                      rows="20"></textarea>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="col-12">
                                                    <hr>
                                                    <h4 class="card-title">
                                                        ویژگی های محصول
                                                    </h4>
                                                    <div data-repeater-list="features">
                                                        <div data-repeater-item>
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    <label for="feature_title">عنوان ویژگی </label>
                                                                    <input name="f_title" type="text" class="form-control" id="feature_title" required
                                                                           placeholder="ابعاد">
                                                                </div>
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    <label for="feature_value">مقدار ویژگی</label>
                                                                    <input name="f_value" type="text" class="form-control" required
                                                                           id="feature_value" placeholder="۲۶.۵x۶.۵x۲۱ سانتی‌متر">
                                                                </div>

                                                                <div
                                                                    class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn btn-danger text-nowrap px-1"
                                                                            data-repeater-delete type="button"><i
                                                                            class="bx bx-x"></i>
                                                                        حذف
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col p-0">
                                                            <button class="btn btn-primary" data-repeater-create
                                                                    type="button"><i class="bx bx-plus"></i>
                                                                افزودن ویژگی
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <br>
                                                    <h6>تصویر</h6>
                                                    <fieldset>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="inputGroupFileAddon01">آپلود</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input required type="file" name="image"
                                                                       class="custom-file-input" id="inputGroupFile01"
                                                                       aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label" for="inputGroupFile01">انتخاب
                                                                    فایل</label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>



                                                <div class="col-sm-6">
                                                    <h6>&nbsp;</h6>
                                                    <br>
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1 float-right">
                                                        <i class="bx bx-check"></i>
                                                        <span class="ml-25">ثبت اطلاعات</span>
                                                    </button>
                                                </div>


                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Inputs Groups end -->


            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('script')
    <script src="{{asset('/admin/assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('/admin/assets/js/scripts/forms/form-repeater.js')}}"></script>
    <script
        src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script
        src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/forms/select/form-select2.js')}}"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            toolbar_mode: 'floating',
            convert_urls: false,
            relative_urls : false,
            directionality: "rtl"
        });
    </script>


    <script type="text/javascript">

        $(document).ready(function () {
            $('#category').change(function () {
                var id = $(this).val();
                if (id === '') {
                    $('#sub_category').find('option').not(':first').remove();
                    // $('select').niceSelect('destroy'); //destroy the plugin
                    // $('select').niceSelect(); //apply again
                } else {
                    $('#sub_category').find('option').not(':first').remove();

                    $.ajax({
                        url: '/admin/get/sub-categories/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function (response) {
                            var len = 0;
                            if (response.data != null) {
                                len = response.data.length;
                            }

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response.data[i].id;
                                    var name = response.data[i].name;

                                    var option = '<option value="' + id + '">' + name + '</option>';

                                    $("#sub_category").append(option);
                                    // $('select').niceSelect('destroy'); //destroy the plugin
                                    // $('select').niceSelect(); //apply again
                                }
                            }
                        }
                    })
                }


            });
        });
    </script>

@endsection
