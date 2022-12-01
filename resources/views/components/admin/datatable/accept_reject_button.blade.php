@if($accept)
    <a href="{{ $accept }}" class="btn btn-xs btn-primary change-status" role="button" data-title="{{__('Accept')}}"
       data-toggle="modal"
       data-target="#modal-ch-status" data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::ACCEPTED) }}">
        <i class="glyphicon glyphicon-edit" role="button"></i> {{__('Accept')}}</a>
@endif
@if($reject)
    <a href="{{ $reject }}" class="btn btn-xs btn-danger change-status" role="button" data-title="{{__('Reject')}}"
       data-toggle="modal"
       data-target="#modal-ch-status" data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::REJECTED) }}">
        <i class="glyphicon glyphicon-edit" role="button"></i> {{__('Reject')}}</a>
@endif
@if($view)
    <a href="{{ $view }}" class="btn btn-xs btn-info"><i
            class="glyphicon glyphicon-edit" role="button"></i> {{__('View')}}</a>
@endif


