@extends('layouts.admin.master')
@section('title' , 'مرجوعی')


@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">درخواست های مرجوعی</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">درخواست های مرجوعی
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
                                    <h4 class="card-title">درحواست های مرجوعی</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>سفارش</th>
                                                    <th>تاریخ ثبت</th>
                                                    <th>خوانده شده / نشده</th>
                                                    <th>متن</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($problems as $problem)
                                                    <tr>
                                                        <td><a href="{{route('admin.orders.detail' , $problem->order->id)}}">{{$problem->order->order_number}}</a></td>
                                                        <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($problem->created_at)->format('%d %B %Y')}}</td>
                                                        <td>
                                                            @if($problem->is_read == 0)
                                                                <div class="badge badge-danger d-inline-flex align-items-center mr-1 mb-1">
                                                                    <a href="{{route('admin.problems.mark' , $problem->id)}}" class="text-white">
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
                                                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#msg-{{$problem->id}}"><i class="badge-circle badge-circle-light-secondary bx bx-envelope font-medium-1"></i></a></td>

                                                    </tr>
                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="msg-{{$problem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header ">
                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                                                                        <i class="bx bx-x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>{{$problem->description}}</p>
                                                                    @if($problem->image)
                                                                        <hr>

                                                                        <img src="{{asset('storage/problem_images/' . $problem->image)}}" alt="">
                                                                    @endif
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

                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>سفارش</th>
                                                    <th>تاریخ ثبت</th>
                                                    <th>خوانده شده / نشده</th>
                                                    <th>متن</th>
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



