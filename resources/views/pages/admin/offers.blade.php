@extends('layouts.admin.master')
@section('title' , ' پیشنهاد ها')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">پیشنهاد ها</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active"> پیشنهاد ها
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
                                    <h4 class="card-title">پیشنهاد ها</h4>
                                    @if($offers->count() < 4)
                                        <a href="javascript:void (0)" data-target="#add" data-toggle="modal"
                                           class="btn btn-primary glow mr-1 mb-1 float-right"><i
                                                class="bx bxs-add-to-queue"></i>
                                            <span class="align-middle ml-25"> مورد جدید</span></a>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>تصویر</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($offers as $offer)
                                                    <tr>
                                                        <td>{{$offer->name}}</td>
                                                        <td><img src="/storage/offer_images/{{$offer->image}}" width="50" height="50"></td>
                                                        <td>
                                                            <a data-target="#edit-{{$offer->id}}" data-toggle="modal"
                                                               class="text-primary pointer"
                                                               data-placement="bottom"
                                                               title="ویرایش">
                                                                <i class="bx bx-edit-alt"></i></a>
                                                            <a data-target="#delete-{{$offer->id}}"
                                                               class="text-danger pointer"
                                                               data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--delete theme Modal -->
                                                    <div class="modal fade text-left" id="delete-{{$offer->id}}"
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
                                                                    <form action="{{route('offer.delete' , $offer->id)}}"
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
                                                    <div class="modal fade text-left" id="edit-{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <h4 class="modal-title" id="myModalLabel33">ویرایش  </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('offer.update' , $offer->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <label>عنوان پیشنهاد: </label>
                                                                        <div class="form-group">
                                                                            <fieldset class="form-group position-relative has-icon-left">
                                                                                <input type="text" name="name" class="form-control" id="iconLeft1"
                                                                                       placeholder="پیشنهاد ویژه"  value="{{$offer->name}}" required>
                                                                                <div class="form-control-position">
                                                                                    <i class="bx bx-pencil"></i>
                                                                                </div>
                                                                            </fieldset>
                                                                            <label>لینک : </label>

                                                                            <div class="form-group">
                                                                                <fieldset class="form-group position-relative has-icon-left">
                                                                                    <input type="text" name="link" class="form-control" id="iconLeft1"
                                                                                           placeholder="https://"  value="{{$offer->link}}" required>
                                                                                    <div class="form-control-position">
                                                                                        <i class="bx bx-pencil"></i>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>


                                                                        </div>
                                                                        <fieldset class="form-group">
                                                                            <label for="basicInputFile">تصویر</label>
                                                                            <div class="custom-file">
                                                                                <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
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
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>عنوان</th>
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
    <div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">اضافه کردن مورد جدید </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{route('offer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>عنوان پیشنهاد : </label>
                        <div class="form-group">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="name" class="form-control" id="iconLeft1"
                                       placeholder="پیشنهاد ویژه"  value="{{old('name')}}" required>
                                <div class="form-control-position">
                                    <i class="bx bx-pencil"></i>
                                </div>
                            </fieldset>
                            <label>لینک : </label>
                            <div class="form-group">
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="text" name="link" class="form-control" id="iconLeft1"
                                           placeholder="https://"  value="{{old('link')}}" required>
                                    <div class="form-control-position">
                                        <i class="bx bx-pencil"></i>
                                    </div>
                                </fieldset>
                            </div>

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

