@extends('layouts.admin.admin_layout',['title'=>'Accepted Jobs Listing'])
@section('content')

    @push('styles')
        {{-- Custom Style --}}
    @endpush
    <x-admin.ui.datatable :data-table="$dataTable" title="">
        <x-slot name="breadcrumb">
            <x-admin.title-and-breadcrumb title="Accepted Jobs"
                                          breadcrumbs='{"Home":"dashboard","Jobs":"myjob.index","Accepted Jobs":""}'/>
        </x-slot>
    </x-admin.ui.datatable>

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
                            <div class="col-lg-12 image-upload d-none">
                                <label for="photo" class="form-label">Upload Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="photo" capture="user" accept="image/*">
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
            $('body').on('click','.change-status',function (){
                let title=$(this).data('title');
                let url=$(this).attr('href');
                let status_id=$(this).data('id');
                $('#modal-ch-status').find('h4.modal-title').text(title);
                $('#modal-ch-status').find('button[type="submit"]').text(title);
                $('#modal-ch-status #status_change_modal').attr('action',url);
                $('#modal-ch-status #status').val(status_id);
                if(title=="Delivered")
                {
                    $('#modal-ch-status #status_change_modal').attr('enctype',"multipart/form-data");
                    $('.image-upload input[type="file"]').attr('required',true);
                    $('.image-upload').removeClass('d-none');
                }else {
                    $('#modal-ch-status #status_change_modal').attr('enctype',"");
                    $('.image-upload').addClass('d-none');
                    $('.image-upload input[type="file"]').attr('required',false);
                }
            })
        </script>
    @endpush
@endsection
