<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ url('admin_design/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ url('admin_design/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ url('admin_design/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/chart.js/dist/Chart.extension.js') }}"></script>
<!-- Argon JS -->

<script src="{{ url('admin_design/js/argon.js?v=1.2.0') }}"></script>
<script src="{{ url('admin_design/js/customerFun.js') }}"></script>


<!-- DataTables -->
<script src=" {{ url('admin_design\vendor\datatables.net\js\jquery.dataTables.min.js') }} "></script>
<script src=" {{ url('admin_design\vendor\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }} "></script>
<script src=" {{ url('admin_design\vendor\datatables.net-buttons\js\dataTables.buttons.min.js') }} "></script>
<script src=" {{ url('admin_design\vendor\datatables\buttons.server-side.js') }}"></script>




<script src="{{ url('admin_design/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('admin_design/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>


{{-- jstree --}}
<script src="{{ url('admin_design\jstree\jstree.min.js') }}"></script>

{{-- datepicker --}}
<script src=" {{ url('admin_design\vendor\bootstrap-datepicker\dist\js\bootstrap-datepicker.min.js') }} "></script>
<script src=" {{ url('admin_design\vendor\bootstrap-datepicker\dist\js\bootstrap-datepicker.ar.min.js') }} "></script>


{{-- Selete 2 --}}
<script src=" {{ url('admin_design\vendor\select2\dist\js\select2.min.js') }} "></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });

</script>




{{-- sweetalert 2 --}}
<script src="{{ url('admin_design/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script>
    $(function () {
        'use strict';

        $('#datatable-buttons').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: '    بحث...',
                sSearch: '',
                lengthMenu: '_MENU_ عنصر / صفحة',
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق"
                },
            },

            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                text: 'طباعة',
                className: 'btn btn-default mb-3',
                autoPrint: false
            }]

        });

    });

</script>



{{--ckeditor standard--}}
<script src="{{ url('admin_design/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.config.language = "ar";

</script>





{{-- for test --}}
<script src="{{ url('admin_design/custom/jquery.validate.min.js') }}"></script>
<script src="{{ url('admin_design/custom/validation.js') }}"></script>





@yield('js')


</body>

</html>
