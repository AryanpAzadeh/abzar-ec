@extends('layouts.admin.master')
@section('title' , ' تنظیمات حمل و نقل')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">تنظیمات</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active"> حمل و نقل
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
                                    <h4 class="card-title">تنظیمات حمل و نقل</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>تومان</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{\App\Models\Setting::first()->value}}</td>
                                                    <td>
                                                        <form action="{{route('admin.setting_shipping_update')}}" method="get">
                                                            <input type="text" class="form-control w-50" name="value"
                                                                   placeholder="مبلغ به تومان">
                                                            <button type="submit" class="btn btn-primary">ثبت</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <!--delete theme Modal -->

                                                <!--assets_login form Modal -->
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>تومان</th>
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

@endsection

