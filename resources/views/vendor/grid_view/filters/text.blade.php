@php
/** @var string $name */
/** @var string $value */
@endphp
<input type="text" class="form-control" name="filters[{{ $name }}]" value="{{ $value }}" role="grid-view-filter-item" onfocusout="if($(this).val()){$('#grid_view_filters_form').submit();}">
