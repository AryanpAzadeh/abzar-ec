<!-- BEGIN: Header-->
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon bx bx-menu"></i></a></li>

                    </ul>
                    <ul class="nav navbar-nav bookmark-icons" >
                        <li  class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="پروژه ها"><i class="ficon bx bxs-collection"></i></a></li>
                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon bx bx-fullscreen"></i></a></li>
{{--                    @if(\App\ProjectFile::where([['status' , '!=' , 2] , ['is_read' , 0]])->count() > 0)--}}
{{--                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">{{\App\ProjectFile::where([['status' , '!=' , 2] , ['is_read' , 0]])->count()}}</span></a>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-media">--}}
{{--                                <li class="dropdown-menu-header">--}}
{{--                                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">{{\App\ProjectFile::where([['status' , '!=' , 2] , ['is_read' , 0]])->count()}} اعلان جدید</span></div>--}}
{{--                                </li>--}}
{{--                                <li class="scrollable-container media-list">--}}
{{--                                    @foreach(\App\ProjectFile::where([['status' , '!=' , 2] , ['is_read' , 0]])->get() as $file)--}}
{{--                                        <a class="d-flex justify-content-between" href="{{route('pmis.add.file' , \App\Project::where('id' , $file->project_id)->first()->id)}}">--}}
{{--                                            <div class="media d-flex align-items-center">--}}
{{--                                                <div class="media-left pr-0">--}}
{{--                                                </div>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <h6 class="media-heading"><span class="text-bold-500">{{\App\Project::where('id' , $file->project_id)->first()->name}}</span></h6><small class="notification-text">{{\Hekmatinasser\Verta\Facades\Verta::instance(\App\Project::where('id' , $file->project_id)->first()->updated_at)}}</small>--}}
{{--                                                </div>--}}
{{--                                            </div></a>--}}
{{--                                    @endforeach--}}

{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @endif--}}

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                    class="user-name">آریا آزاده</span><span
                                    class="user-status text-muted">آنلاین</span></div>
                            <span><img class="round"
                                       src="#"
                                       alt="avatar" height="40" width="40"></span></a>
                        <div class="dropdown-menu pb-0">
                            <a class="dropdown-item" target="_blank"
                               href="/"><i
                                    class="bx bxl-wikipedia mr-50"></i>مشاهده وب سایت</a>
                            <div class="dropdown-divider mb-0"></div>
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();"><i--}}
{{--                                    class="bx bx-power-off mr-50"></i> خروج</a>--}}
{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
