@extends('layouts.admin.master')
@section('title' , 'مقالات')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">صفحه وبلاگ</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">مقالات
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
                                    <h4 class="card-title">مقالات شما</h4>
                                    <a href="{{route('article.add')}}"
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
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($articles as $article)
                                                    <tr>
                                                        <td>{{$article->title}}</td>
                                                        <td>
                                                            {{$article->category->name}}
                                                        </td>

                                                        <td>
                                                            <a href="{{route('article.edit' , $article->id)}}"
                                                               class=" mr-1 mb-1 pointer"
                                                               data-toggle="tooltip" data-placement="bottom"
                                                               title="ویرایش">
                                                                <i class="bx bx-file text-info"></i></a>
                                                            <a href="{{route('article.comment' , $article->id)}}"
                                                               class=" mr-1 mb-1 pointer"
                                                               data-toggle="tooltip" data-placement="bottom"
                                                               title="نظرات">
                                                                <i class="bx bxs-comment-detail text-primary"></i></a>
                                                            <a data-target="#delete-{{$article->id}}"
                                                               class=" mr-1 mb-1 pointer"
                                                               data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--delete theme Modal -->
                                                    <div class="modal fade text-left" id="delete-{{$article->id}}"
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
                                                                    <form action="{{route('article.delete' , $article->id)}}"
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

