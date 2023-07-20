@extends('layouts.admin.master')
@section('title' , 'نظرات مقاله')

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
                                    <li class="breadcrumb-item">نظرات مقاله : {{$article->title}}
                                    </li>
                                    <li class="breadcrumb-item active">نظرات
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
                                    <h4 class="card-title">نظرات مقاله {{$article->title}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>ایمیل</th>
                                                    <th>نظر</th>
                                                    <th>نمایش / عدم نمایش</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($comments as $comment)
                                                    <tr>
                                                        <td>{{$comment->name}}</td>
                                                        <td>{{$comment->email}}</td>
                                                        <td><a href="javascript:void (0)" data-toggle="modal" data-target="#msg-{{$comment->id}}">{{\Illuminate\Support\Str::words($comment->comment,$words = 4 , $end = '...') }} </a></td>                                                        <td>
                                                            @if($comment->active == 0)
                                                                <div class="badge badge-danger d-inline-flex align-items-center mr-1 mb-1">
                                                                    <a href="{{route('article.comment.mark' , $comment->id)}}" class="text-white">
                                                                        <i class="bx bx-x font-size-small mr-25"></i>
                                                                        <span>عدم نمایش</span>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="badge badge-success d-inline-flex align-items-center mr-1 mb-1">
                                                                    <a href="{{route('article.comment.mark' , $comment->id)}}" class="text-white">
                                                                       <i class="bx bx-check-double font-size-small mr-25"></i>
                                                                       <span> نمایش</span>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </td>

                                                        <td>

                                                            <a data-target="#delete-{{$comment->id}}"
                                                               class="btn btn-icon btn-light-danger mr-1 mb-1 pointer"
                                                               data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="msg-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header ">
                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">ثبت شده توسط : {{$comment->name}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>{{$comment->comment}}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">بستن</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--delete theme Modal -->
                                                    <div class="modal fade text-left" id="delete-{{$comment->id}}"
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
                                                                    <form action="{{route('article.comment.delete' , $comment->id)}}"
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

