@if(isset($view))
    <a href="{{ $view }}" class="btn btn-xs btn-primary"><i
            class="glyphicon glyphicon-edit" role="button"></i> {{__('View')}}</a>
@endif
@if(isset($picked_up))
    <form action="{{ $picked_up }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" id="status" value="{{ App\Models\JobStatus::getStatusId(\App\Models\JobStatus::PICKED_UP) }}">
        <button type="submit" class="btn btn-secondary btn-sm d-flex">{{ __('Picked Up') }}</button>
    </form>
@endif
@if(isset($delivered))
    <form action="{{ $delivered }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" id="status" value="{{ App\Models\JobStatus::getStatusId(\App\Models\JobStatus::DELIVERED) }}">
        <button type="submit" class="btn btn-success btn-sm d-flex">{{ __('Delivered') }}</button>
    </form>
@endif
