@push('styles')
    @once
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    @endonce
@endpush

<!-- Content Header (Page header) -->
<div class="content-header">
    {{ $breadcrumb }}
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-striped'], true) !!}
        </div>
        <!-- /.card-body -->
    </div>
    @prepend('scripts')
        <div class="modal fade" id="modal-sm-delete">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{  __('Delete') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('Are you sure ?')}}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__("Close")}}</button>
                        <form class="d-none delete-form" id="delete-form_delete" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="submit" class="btn btn-primary"
                                onclick="event.preventDefault();document.getElementById('delete-form_delete').submit();">{{  __('Delete') }}</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endprepend
    @push('scripts')
        @once
            <script>
                $('body').one('click','.delete',function(e){
                    e.preventDefault();
                    let action = $(this).attr('href');
                    $('#delete-form_delete').attr('action',action);
                });
            </script>
            <!-- DataTables  & Plugins -->
            <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
            <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
            <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        @endonce
{!! $dataTable->scripts() !!}
@endpush
