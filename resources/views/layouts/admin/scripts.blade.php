<!-- BEGIN: Vendor JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/extensions/swiper.min.js')}}"></script>
<!-- END: Page Vendor JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/extensions/toastr.min.js')}}"></script>

<!-- BEGIN: Theme JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/configs/vertical-menu-light.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/core/app-menu.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/core/app.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/components.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/footer.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/customizer.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<!-- END: Page JS-->


<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script
    src="{{\Illuminate\Support\Facades\URL::asset('/admin/assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<!-- END: Page Vendor JS-->
<script
    src="{{\Illuminate\Support\Facades\URL::asset('admin/assets/js/scripts/datatables/datatable.js')}}"></script>

<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
    toastr.success('{{session('success')}}', 'موفق', {
        rtl: true,
        positionClass: 'toast-top-left',
        progressBar: true,
    });
    @endif

    @if(\Illuminate\Support\Facades\Session::has('error'))
    toastr.error('{{session('error')}}', 'خطا', {
        rtl: true,
        positionClass: 'toast-top-left',
        progressBar: true,
    });
    @endif

    @if(count($errors))
    toastr.error('{{$errors->first()}}', 'خطا', {
        rtl: true,
        positionClass: 'toast-top-left',
        progressBar: true,
    });
    @endif
</script>
