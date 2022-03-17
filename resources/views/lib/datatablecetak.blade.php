@push('css')
<!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" />
@endpush

@push('script')
    <!-- DataTables  & vendor -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
