@extends('layouts.admin.admin_layout',['title'=>'Jobs Listing'])
@section('content')

    @push('styles')
        {{-- Custom Style --}}
    @endpush
    <x-admin.ui.datatable :data-table="$dataTable" title="">
        <x-slot name="breadcrumb">
            <x-admin.title-and-breadcrumb title="Jobs"
                                          breadcrumbs='{"Home":"dashboard","Jobs":""}'/>
        </x-slot>
    </x-admin.ui.datatable>

    <div class="modal fade" id="modal-sm-assign">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="{{ Helper::getRoute('job.assignDriver') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Assign Driver') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <x-admin.ui.select label="Select Driver"
                                                   name="driver_id"
                                                   id="driver_id"
                                                   options="driver.list"
                                                   add-class="driver_id"
                                                   required

                                />
                                <input type="hidden" name="order_job_id" id="order_job_id" required>
                            </div>
                            <div class="col-lg-12">
                                <x-admin.ui.Textarea label="Comment"
                                                     name="comment"
                                                     id="comment"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ __('Assign') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-ch-status">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="status_change_modal" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="status" id="status" required>
                            </div>
                            <div class="col-lg-12">
                                <x-admin.ui.Textarea label="Comment"
                                                     name="comment"
                                                     id="comment"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.mass-assign').attr('disabled', true);
            });
            $('body').on('click', '.assign-driver', function (e) {
                e.preventDefault();
                $('#order_job_id').val($(this).data('id'));
            });
            ``
            $('body').on('click', '.mass-assign-checkbox', function () {
                if ($('.mass-assign-checkbox:checked').length > 0) {
                    $('.mass-assign').removeClass('disabled');
                    $('.mass-assign').attr('disabled', false);
                } else {
                    $('.mass-assign').addClass('disabled');
                    $('.mass-assign').attr('disabled', true);
                }
            });
            $('body').on('click', '.mass-assign', function () {
                let order_job_id = [];
                $('.mass-assign-checkbox:checked').each(function (index) {
                    order_job_id[index] = $(this).val();
                });
                $('#order_job_id').val(JSON.stringify(order_job_id));
                $('#modal-sm-assign').modal('show');
            });
            $('body').on('click','.change-status',function (){
                let title=$(this).data('title');
                let url=$(this).attr('href');
                let status_id=$(this).data('id');
                $('#modal-ch-status').find('h4.modal-title').text(title);
                $('#modal-ch-status').find('button[type="submit"]').text(title);
                $('#modal-ch-status #status_change_modal').attr('action',url);
                $('#modal-ch-status #status').val(status_id);
            })
        </script>
    @endpush
@endsection
