@extends('layouts.admin.master')
@section('title' , 'سفارشات')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">سفارشات</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">لیست سفارشات
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
                                    <h4 class="card-title">سفارشات</h4>

                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>شماره سفارش</th>
                                                    <th>نام و نام خانوادگی</th>
                                                    <th>وضعیت</th>
                                                    <th>وضعیت پرداخت</th>
                                                    <th>تاریخ ثبت سفارش</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td><a href="{{route('admin.orders.detail' , $order->id)}}">{{$order->order_number}}</a></td>
                                                        <td>{{$order->name}}</td>
                                                        <td>@switch($order->status)
                                                                @case('pending')
                                                                    <a href="{{route('admin.orders.mark' , $order->id)}}"><span class="badge badge-warning"> در صف تایید</span></a>
                                                                    @break
                                                                @case('processing')
                                                                    <a href="{{route('admin.orders.mark' , $order->id)}}"><span class="badge badge-info">درحال پردازش</span></a>
                                                                    @break
                                                                @case('completed')
                                                                    <a href="{{route('admin.orders.mark' , $order->id)}}"><span class="badge badge-success">تکمیل شده</span></a>
                                                                    @break
                                                                @case('sending')
                                                                    <a href="{{route('admin.orders.mark' , $order->id)}}"><span class="badge badge-success">ارسال شده</span></a>
                                                                    @break
                                                                @case('decline')
                                                                    <a href="{{route('admin.orders.mark' , $order->id)}}"><span class="badge badge-danger">لغو شده</span></a>
                                                                    @break
                                                            @endswitch
                                                        </td>

                                                        <td>
                                                            @if(!$order->is_paid)
                                                                <span class="badge badge-danger"> پرداخت نشده</span>
                                                            @else
                                                                <span class="badge badge-success"> پرداخت شده</span>

                                                            @endif
                                                        </td>
                                                        <td>{{\Hekmatinasser\Verta\Verta::instance($order->created_at)->format('%d %B  %Y')}}</td>


                                                        <td>
                                                            <a data-target="#delete-{{$order->id}}"
                                                               class="text-danger pointer"
                                                               data-toggle="modal" data-placement="bottom" title="حذف">
                                                                <i class="bx bx-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--delete theme Modal -->
                                                    <div class="modal fade text-left" id="delete-{{$order->id}}"
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
                                                                    <form action="{{route('admin.orders.delete' , $order->id)}}"
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

