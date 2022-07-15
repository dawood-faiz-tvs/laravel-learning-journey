<label>{{ $label }} <small>({{ $info }})</small></label>
@if(!empty($old))
<input type="{{ $type }}" name="{{ $name }}" value="@if(!empty($old) && $old == "true") {{old($name)}} @endif"/>
@else
<input type="{{ $type }}" name="{{ $name }}" value="{{ $val }}"/>
@endif

<div class="all_errors">
    @error($name)
      {{ $message }}
    @enderror
</div>