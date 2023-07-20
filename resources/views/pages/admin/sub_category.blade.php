@extends('layouts.admin.master')
@section('title' , 'زیر دسته بندی محصولات')
@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/css/forms/select/select2.min.css')}}">
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
                            <h5 class="content-header-title float-left pr-1">زیر دسته بندی محصولات</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active"> زیر دسته بندی ها
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">زیر دسته بندی محصولات</h4>
                                    <a href="javascript:void (0)" data-target="#add" data-toggle="modal"
                                       class="btn btn-primary glow mr-1 mb-1 float-right"><i
                                            class="bx bxs-add-to-queue"></i>
                                        <span class="align-middle ml-25"> مورد جدید</span></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>دسته بندی</th>
                                                    <th>عنوان دسته بندی</th>
                                                    <th>تصویر</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($sub_categories as $sub_category)
                                                    <tr>
                                                        <td>{{$sub_category->name}}</td>
                                                        <td>{{$sub_category->category->name}}</td>
                                                        <td>{{$sub_category->categorytitle->title}}</td>
                                                        <td><img src="/storage/sub_category_images/{{$sub_category->image}}" width="50" height="50"></td>
                                                        <td>
                                                            <a data-target="#edit-{{$sub_category->id}}" data-toggle="modal"
                                                               class="text-primary pointer"
                                                               data-placement="bottom"
                                                               title="ویرایش">
                                                                <i class="bx bx-edit-alt"></i></a>
                                                            <a data-target="#delete-{{$sub_category->id}}"
                                                               class="text-danger pointer"
                                                               data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--delete theme Modal -->
                                                    <div class="modal fade text-left" id="delete-{{$sub_category->id}}"
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
                                                                    <form
                                                                        action="{{route('product.sub_category.delete' , $sub_category->id)}}"
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

                                                    <!--assets_login form Modal -->
                                                    <div class="modal fade text-left" id="edit-{{$sub_category->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                         aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <h4 class="modal-title" id="myModalLabel33">ویرایش
                                                                        : {{$sub_category->name}} </h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{route('product.sub_category.update' , $sub_category->id)}}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <label>عنوان دسته بندی: </label>
                                                                        <div class="form-group">
                                                                            <fieldset
                                                                                class="form-group position-relative has-icon-left">
                                                                                <input type="text" name="name"
                                                                                       class="form-control"
                                                                                       id="iconLeft1"
                                                                                       placeholder="شارژی"
                                                                                       value="{{$sub_category->name}}"
                                                                                       required>
                                                                                <div class="form-control-position">
                                                                                    <i class="bx bx-pencil"></i>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <select class="select2-t form-control" name="category_id" id="category_update" onchange="update_category()" required>
                                                                                <option value="{{null}}">لطفا عنوان را انتخاب کنید</option>
                                                                                @foreach($categories as $cat)
                                                                                    <option
                                                                                        value="{{$cat->id}}" {{$cat->id == $sub_category->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <select class="select2-t form-control" name="categorytitle_id" id="categorytitle_update" required>
                                                                                <option value="{{$sub_category->categorytitle->id}}">{{$sub_category->categorytitle->title}}</option>

                                                                                <option value="{{null}}">لطفا عنوان را انتخاب کنید</option>

                                                                            </select>
                                                                        </div>
                                                                        <fieldset class="form-group">
                                                                            <label for="basicInputFile">تصویر</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                                <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn btn-light-secondary"
                                                                                data-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">بستن</span>
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-primary ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span
                                                                                class="d-none d-sm-block">ثبت اطلاعات</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>دسته بندی</th>
                                                    <th>عنوان دسته بندی</th>
                                                    <th>تصویر</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </tfoot>
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

    <!--assets_login form Modal -->
    <div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">اضافه کردن مورد جدید </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{route('product.sub_category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>عنوان دسته بندی: </label>
                        <div class="form-group">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="name" class="form-control" id="iconLeft1"
                                       placeholder="برقی" value="{{old('name')}}" required>
                                <div class="form-control-position">
                                    <i class="bx bx-pencil"></i>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <select class="select2 form-control" name="category_id" id="category" required>
                                <option value="{{null}}">لطفا یک مورد را انتخاب کنید</option>

                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <select class="select2 form-control" name="categorytitle_id" id="categorytitle" required>

                                <option value="{{null}}">لطفا یک مورد را انتخاب کنید</option>

                            </select>
                        </div>
                        <fieldset class="form-group">
                            <label for="basicInputFile">تصویر</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
                                <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">بستن</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">ثبت اطلاعات</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script
        src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script
        src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/forms/select/form-select2.js')}}"></script>

    <script>

        $(".select2-t").select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%',
            language: "fa"
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#category').change(function () {
                var id = $(this).val();
                if (id === null) {
                    $('#categorytitle').find('option').not(':first').remove();
                    // $('select').niceSelect('destroy'); //destroy the plugin
                    // $('select').niceSelect(); //apply again
                } else {
                    $('#categorytitle').find('option').not(':first').remove();

                    $.ajax({
                        url: '/admin/get/category/titles/' + id,
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
                                    var name = response.data[i].title;

                                    var option = '<option value="' + id + '">' + name + '</option>';

                                    $("#categorytitle").append(option);
                                    // $('select').niceSelect('destroy'); //destroy the plugin
                                    // $('select').niceSelect(); //apply again
                                }
                            }
                        }
                    })
                }


            });
        });


        function update_category()
        {
            $('#category_update').change(function () {
                var id = $(this).val();
                if (id === null) {
                    $('#categorytitle_update').children().first().remove();
                    // $('select').niceSelect('destroy'); //destroy the plugin
                    // $('select').niceSelect(); //apply again
                } else {
                    $('#categorytitle_update').children().first().remove();

                    $.ajax({
                        url: '/admin/get/category/titles/' + id,
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
                                    var name = response.data[i].title;

                                    var option = '<option value="' + id + '">' + name + '</option>';

                                    $("#categorytitle_update").append(option);
                                    // $('select').niceSelect('destroy'); //destroy the plugin
                                    // $('select').niceSelect(); //apply again
                                }
                            }
                        }
                    })
                }


            });

        }
    </script>

@endsection
