@if(isset($view))
    <a href="{{ $view }}" class="btn btn-xs btn-primary"><i
            class="glyphicon glyphicon-edit" role="button"></i> {{__('View')}}</a>
@endif
@if(isset($picked_up))
    <a href="{{ $picked_up }}" class="btn btn-xs btn-info change-status" role="button" data-title="{{__('Picked Up')}}"
       data-toggle="modal"
       data-target="#modal-ch-status" data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::PICKED_UP) }}">
        <i class="glyphicon glyphicon-edit" role="button"></i> {{__('Picked Up')}}</a>
@endif
@if(isset($delivered))
    <a href="{{ $delivered }}" class="btn btn-xs btn-success change-status" role="button" data-title="{{__('Delivered')}}"
       data-toggle="modal"
       data-target="#modal-ch-status" data-id="{{ \App\Models\JobStatus::getStatusId(\App\Models\JobStatus::DELIVERED) }}">
        <i class="glyphicon glyphicon-edit" role="button"></i> {{__('Delivered')}}</a>
@endif
