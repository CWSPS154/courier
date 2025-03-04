<div class="form-group {{ $formGroupClass }}">
    <label for="{{ $id }}">{{ __($label) }} @if($required)
            <span class="text-danger">*</span>
        @endif</label>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror {{ $addClass }}"
           id="{{ $id }}"
           placeholder="{{ __($placeholder) }}" value="{{ old($name,$value) }}" @if($required) required
           @endif @if($disable) disabled @endif
           @if($readonly) readonly @endif @if($autocomplete) autocomplete="on"
           @else autocomplete="off" @endif {{ $other }}>
    @if(isset($hint))
        <small id="{{ $id }}" class="form-text text-muted">{{ $hint }}</small>
    @endif
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ __($message) }}</strong>
    </span>
    @enderror
</div>
