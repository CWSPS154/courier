@if(isset($edit))
    <a href="{{ $edit }}" class="btn btn-xs btn-primary"><i
            class="glyphicon glyphicon-edit" role="button"></i> {{__('Edit')}}</a>
@endif
@if(isset($delete))
    <a class="btn btn-xs btn-danger delete" href="{{ $delete }}" role="button" onclick="event.preventDefault();"
       data-id="{{ $id }}"
       data-toggle="modal"
       data-target="#modal-sm-delete">
        <i class="glyphicon glyphicon-edit" role="button"></i>
        {{  __('Delete') }}
    </a>
@endif
@if(isset($assign))
    <a href="#" class="btn btn-xs btn-success assign-driver" onclick="event.preventDefault();"
       data-toggle="modal"
       data-target="#modal-sm-assign" data-id="{{ $id }}"><i
            class="glyphicon glyphicon-edit" role="button"></i> {{__('Assign')}}</a>
@endif

