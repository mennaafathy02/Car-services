<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
{{-- <script src="{{ asset('plugins/chart.js/chart.js') }}"></script> --}}
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@yield("script")
<!-- Page specific script -->
<script>
    $(function() {
        $('input[type=number]').on('input', function() {
            if ($(this).val() < 1) {
                $(this).val(1);
            }
        });
        $('.alert-success').delay(3000).fadeOut(350);
        // if lang is ar datatable use arabic with buttons for copy and pdf and exal and others options
        var lang = '{{ app()->getLocale() }}';
        if (lang == 'ar') {
            // dataTable for arabic and but buttons for arabic
            $("#gradeTable").DataTable({
                "responsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

                , "columnDefs": [{
                    "targets": [0]
                    , "searchable": false
                }]
                , "language": {
                    "sProcessing": "جارٍ التحميل..."
                    , "sLengthMenu": "أظهر _MENU_ مدخلات"
                    , "sZeroRecords": "لم يعثر على أية سجلات"
                    , "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل"
                    , "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل"
                    , "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)"
                    , "sInfoPostFix": ""
                    , "sSearch": "<span> ابحث:</span>"
                    , "sUrl": ""
                    , "oPaginate": {
                        "sFirst": "الأول"
                        , "sPrevious": "السابق"
                        , "sNext": "التالي"
                        , "sLast": "الأخير"
                    }
                },

            }).buttons().container().appendTo('#gradeTable_wrapper .col-md-6:eq(0)');
            //change attr class of parent flex-wra to col-9
            $('.flex-wrap').parent().attr('class', 'col-lg-6 col-12');
            $('.dataTables_filter').parent().attr('class', 'col-12 col-lg-6');
            // change margin of dataTables_filter
            // $('.dataTables_filter').css('margin', '0 97px 0 0');
            // put padding between of text in lable
            // $('.dataTables_filter label span').css('margin', '0 0  0 11px');





        } else {
            $("#gradeTable").DataTable({
                "responsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "columnDefs": [{
                    "targets": [0]
                    , "searchable": false
                }]
                , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#gradeTable_wrapper .col-md-6:eq(0)');
        }
        // nav-item p captilize
        $('.nav-item p').css('text-transform', 'capitalize');
        // if lang ar font will be for all dashboard
        if (lang == 'ar') {
            $('body').css('font-family', 'Cairo');
        }

    });

</script>
