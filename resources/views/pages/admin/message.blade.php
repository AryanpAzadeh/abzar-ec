@extends('layouts.admin.master')
@section('title' , 'پیام ها')


@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">پیام های دریافتی</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">پیام های دریافتی
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
                                    <h4 class="card-title">پیام های دریافتی</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>نام و نام خانوادگی</th>
                                                    <th>ایمیل</th>
                                                    <th>شماره تماس</th>
                                                    <th>تاریخ ثبت</th>
                                                    <th>خوانده شده / نشده</th>
                                                    <th>متن پیام</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($messages as $message)
                                                    <tr>
                                                        <td>{{$message->name}}</td>
                                                        <td>{{$message->email}}</td>
                                                        <td>{{$message->phone}}</td>
                                                        <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($message->created_at)->format('%d %B %Y')}}</td>
                                                        <td>
                                                            @if($message->read == 0)
                                                                <div class="badge badge-danger d-inline-flex align-items-center mr-1 mb-1">
                                                                    <a href="{{route('admin.message.mark' , $message->id)}}" class="text-white">
                                                                        <i class="bx bx-x font-size-small mr-25"></i>
                                                                        <span>خوانده نشده</span>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="badge badge-success d-inline-flex align-items-center mr-1 mb-1">
                                                                    <i class="bx bx-check-double font-size-small mr-25"></i>
                                                                    <span>خوانده شده</span>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#msg-{{$message->id}}"><i class="badge-circle badge-circle-light-secondary bx bx-envelope font-medium-1"></i></a></td>

                                                        <td>
                                                            <a  data-target="#delete-{{$message->id}}"  class="btn btn-icon btn-light-danger mr-1 mb-1 pointer" data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="msg-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header ">
                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">پیام از طرف : {{$message->name}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>{{$message->message}}</p>
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
                                                    <div class="modal fade text-left" id="delete-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h5 class="modal-title white" id="myModalLabel120">حذف</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body line-height-2">
                                                                    آیا از حذف این مورد اطمینان دارید ؟
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">بستن</span>
                                                                    </button>
                                                                    <form action="{{route('admin.message.delete' , $message->id)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-danger ml-1" >
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
                                                <tfoot>
                                                <tr>
                                                    <th>نام و نام خانوادگی</th>
                                                    <th>ایمیل</th>
                                                    <th>شماره تماس</th>
                                                    <th>تاریخ ثبت</th>
                                                    <th>خوانده شده / نشده</th>
                                                    <th>متن پیام</th>
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
@endsection



