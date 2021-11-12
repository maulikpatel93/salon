@php
/** @var string $field */
/** @var mixed $value */
@endphp
<div class="row">
    <div class="col-12 text-center">
        <input type="checkbox" class="form-check-input" name="{{ $field }}[]" value="{{ $value }}" role="grid-view-checkbox-item" />
    </div>
</div>
