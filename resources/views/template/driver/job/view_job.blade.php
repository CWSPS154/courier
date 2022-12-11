@php use App\Models\JobAssign; use App\Models\JobStatus; @endphp
@extends('layouts.admin.admin_layout',['title'=>'My Job'])
@section('content')

    @push('styles')
        {{-- Custom Style --}}
    @endpush
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <x-admin.title-and-breadcrumb title="My Job"
                                      breadcrumbs='{"Home":"dashboard","Jobs":"myjob.index","My Job":""}'/>
        <!-- /.content-header -->
        <x-admin.ui.card-form title="" form-route="myjob.update" form-id="change_status"
                              form-route-id="{{ collect(request()->segments())->last() }}">
            <x-slot name="input">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-bold">Job Number</span> : {{ $myjob->dailyJob->job_number }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-bold">Created By</span> : {{ $myjob->creator->name }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-bold">Created At</span> : {{ $myjob->created_at->format('Y-m-d h:i A') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 class="text-bold">From Address</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Company Name</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->company_name }}</dd>
                                    <dt class="col-sm-4">Street Number</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->street_number }}</dd>
                                    <dt class="col-sm-4">Suburb</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->suburb }}</dd>
                                    <dt class="col-sm-4">City</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->city }}</dd>
                                    <dt class="col-sm-4">State/Region</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->state }}</dd>
                                    <dt class="col-sm-4">Postal Code</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->zip }}</dd>
                                    <dt class="col-sm-4">Country</dt>
                                    <dd class="col-sm-8">{{ $myjob->fromAddress->country }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 class="text-bold">To Address</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Company Name</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->company_name }}</dd>
                                    <dt class="col-sm-4">Street Number</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->street_number }}</dd>
                                    <dt class="col-sm-4">Suburb</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->suburb }}</dd>
                                    <dt class="col-sm-4">City</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->city }}</dd>
                                    <dt class="col-sm-4">State/Region</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->state }}</dd>
                                    <dt class="col-sm-4">Postal Code</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->zip }}</dd>
                                    <dt class="col-sm-4">Country</dt>
                                    <dd class="col-sm-8">{{ $myjob->toAddress->country }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-bold">Van Hire</span> : {{ $myjob->van_hire ? 'Yes' : 'No' }}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <span class="text-bold">No Of Boxes</span> : {{ $myjob->number_box }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 class="text-bold">Note</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ $myjob->notes ?? 'No Comments' }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Job History</h4>
                                </div>
                            </div>
                            <ul class="timeline p-3">
                                @foreach($myjob->jobStatusHistory as $jobStatusHistory)
                                    {{--                                        <li>--}}
                                    {{--                                            <span class="text-bold">{{ $jobStatusHistory->fromStatus->status ?? 'Job Created' }}</span>--}}
                                    {{--                                            <p class="mt-3">{{ 'Updated By - '.$jobStatusHistory->user->name }}</p>--}}
                                    {{--                                        </li>--}}
                                    <li>
                                        <div class="d-flex justify-content-between display-comment-{{ $jobStatusHistory->id }}">
                                            <span class="text-bold">{{ $jobStatusHistory->toStatus->status .'(Updated By - '.$jobStatusHistory->user->name.')' }} </span>
                                            <span class="text-bold float-right">{{ $jobStatusHistory->created_at->format('Y-M-d h:i A') }}</span>
                                        </div>
                                        @if($jobStatusHistory->user_id==auth()->id())
                                        <div class="d-flex justify-content-between mt-2 show-comment-{{ $jobStatusHistory->id }}">
                                            <p id="comment_para_{{ $jobStatusHistory->id }}">{!! $jobStatusHistory->comment !!}</p>
                                            <div>
                                                <a href="#" class="edit-comment mr-2" data-id="{{ $jobStatusHistory->id }}"><i class="fa fa-edit"></i></a>
                                                @if($jobStatusHistory->comment)
                                                    <a href="#" class="delete-comment" data-id="{{ $jobStatusHistory->id }}"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="d-none" id="{{ $jobStatusHistory->id }}">
                                            <x-admin.ui.Textarea label="Comment"
                                                                 name="update_comment"
                                                                 id="update_comment_{{ $jobStatusHistory->id }}"
                                                                 :value="$jobStatusHistory->comment"
                                            />
                                            <x-admin.ui.button type="button" class="btn-primary job_history" btn-name="Save" name="job_history_{{ $jobStatusHistory->id }}" id="job_history_{{ $jobStatusHistory->id }}" data-id="{{ $jobStatusHistory->id }}"/>
                                        </div>
                                        @else
                                            <p id="comment_para_{{ $jobStatusHistory->id }}">{!! $jobStatusHistory->comment !!}</p>
                                        @endif
                                        @if($jobStatusHistory->getFirstMediaUrl('job_status_images') && $jobStatusHistory->to_status_id==JobStatus::getStatusId(JobStatus::DELIVERED))
                                            <img
                                                src="{{ $jobStatusHistory->getFirstMediaUrl('job_status_images') }}"
                                                alt="no image" class="img-fluid">
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </x-slot>
            @if($myjob->status_id==JobStatus::getStatusId(JobStatus::ASSIGNED))
                <x-slot name="button">
                    <x-admin.ui.button type="button"
                                       class="btn-primary btn-block change-status"
                                       btn-name="Accept"
                                       name="job_status"
                                       id="job_status"
                                       data-title="{{__('Accept')}}"
                                       data-toggle="modal"
                                       data-target="#modal-ch-status"
                                       data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::ACCEPTED) }}"
                                       data-action="{{ Helper::getRoute('myjob.update',$myjob->id) }}"/>
                </x-slot>
            @elseif($myjob->status_id==JobStatus::getStatusId(JobStatus::ACCEPTED))
                <x-slot name="button">
                    <x-admin.ui.button type="button"
                                       class="btn-info btn-block change-status"
                                       btn-name="Picked Up"
                                       name="job_status"
                                       id="job_status"
                                       data-title="{{__('Picked Up')}}"
                                       data-toggle="modal"
                                       data-target="#modal-ch-status"
                                       data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::PICKED_UP) }}"
                                       data-action="{{ Helper::getRoute('myjob.update',$myjob->id) }}"/>
                </x-slot>
            @elseif($myjob->status_id==JobStatus::getStatusId(JobStatus::PICKED_UP))
                <x-slot name="button">
                    <x-admin.ui.button type="button"
                                       class="btn-success btn-block change-status"
                                       btn-name="Delivered"
                                       name="job_status"
                                       id="job_status"
                                       data-title="{{__('Delivered')}}"
                                       data-toggle="modal"
                                       data-target="#modal-ch-status"
                                       data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::DELIVERED) }}"
                                       data-action="{{ Helper::getRoute('myjob.update',$myjob->id) }}"/>
                </x-slot>
            @endif
        </x-admin.ui.card-form>
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
            $('.edit-comment').click(function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#'+id).removeClass('d-none');
                $('.show-comment-'+id).removeClass('d-flex');
                $('.show-comment-'+id).addClass('d-none');
            });

            $('.job_history').click(function (){
                let id = $(this).data('id');
                let comment=$('#update_comment_'+id).val();
                changeStatusHistory(comment,id);
            });

            $('.delete-comment').click(function (e){
                e.preventDefault();
                let id = $(this).data('id');
                deleteStatusHistory(id);
            });

            function changeStatusHistory(comment,id)
            {
                $.ajax({
                    url: '{{ Helper::getRoute('myjob.updateHistory') }}',
                    type: 'post',
                    data: {comment: comment,id:id},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        if(result) {
                            $('#' + id).addClass('d-none');
                            $('.show-comment-'+id).removeClass('d-none');
                            $('.show-comment-'+id).addClass('d-flex');
                            $('#comment_para_'+id).text(comment);
                            toastr.success('Comment updated successfully');
                        }
                    },
                    error:function (){
                        $('#'+id).addClass('d-none');
                        $('.show-comment-'+id).removeClass('d-none');
                        $('.show-comment-'+id).addClass('d-flex');
                        toastr.info('No changes made');
                    }
                });
            }

            function deleteStatusHistory(id)
            {
                $.ajax({
                    url: '{{ Helper::getRoute('myjob.deleteHistory') }}',
                    type: 'post',
                    data: {id:id},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        if(result) {
                            $('#' + id).addClass('d-none');
                            $('.show-comment-'+id).removeClass('d-none');
                            $('.show-comment-'+id).addClass('d-flex');
                            $('#comment_para_'+id).text('');
                            toastr.success('Comment deleted successfully');
                        }
                    },
                    error:function (){
                        $('#'+id).addClass('d-none');
                        $('.show-comment-'+id).removeClass('d-none');
                        $('.show-comment-'+id).addClass('d-flex');
                        toastr.info('No changes made');
                    }
                });
            }

            $('body').on('click','.change-status',function (){
                let title=$(this).data('title');
                let url=$(this).data('action');
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
            });

        </script>
    @endpush
@endsection
