@php
$title_single = 'salon';
$unique_title = str_replace(' ', '_', strtolower($title_single)); //without space
$formName = $title_single . 'form';
$formRoute = !$model->id ? route('admin.salons.store') : route('admin.salons.update', ['id' => encode($model->id)]);
$salon_type = [
    'Unisex' => 'Unisex',
    'Ladies' => 'Ladies',
    'Gents' => 'Gents',
];
$timezone = config('params.timezones');
$working_hours = [['dayoff' => '', 'days' => 'Sunday', 'start_time' => '', 'end_time' => '', 'break_time' => []], ['dayoff' => '1', 'days' => 'Monday', 'start_time' => '', 'end_time' => '', 'break_time' => []], ['dayoff' => '1', 'days' => 'Tuesday', 'start_time' => '', 'end_time' => '', 'break_time' => []], ['dayoff' => '1', 'days' => 'Wednesday', 'start_time' => '', 'end_time' => '', 'break_time' => []], ['dayoff' => '1', 'days' => 'Thursday', 'start_time' => '', 'end_time' => '', 'break_time' => []], ['dayoff' => '1', 'days' => 'Friday', 'start_time' => '', 'end_time' => '', 'break_time' => []], ['dayoff' => '', 'days' => 'Saturday', 'start_time' => '', 'end_time' => '', 'break_time' => []]];

@endphp
{{ Form::open([
    'url' => $formRoute,
    'class' => '',
    'id' => 'gridview-form',
    'name' => $formName,
    'modal' => 1,
    'loader' => $unique_title,
    'files' => true,
    'enableAjaxSubmit' => 1,
]) }}
<div id="formerror" class="formerror"></div>
<div class="mb-3">
    {{ Form::label('business_name') }}
    {{ Form::text('business_name', $model->business_name, [
        'class' => 'form-control',
        'id' => $formName . '-business_name',
        'placeholder' => '',
    ]) }}
</div>
<div class="mb-3">
    {{ Form::label('logo') }}
    {{ Form::file('logo', [
        'id' => $formName . '-logo',
        'accept' => 'image/*',
    ]) }}
</div>

<div class="mb-3">
    {{ Form::label('business_email') }}
    {{ Form::text('business_email', $model->business_email, [
        'class' => 'form-control',
        'id' => $formName . '-business_email',
        'placeholder' => '',
    ]) }}
</div>
<div class="mb-3">
    {{ Form::label('business_phone_number') }}
    {{ Form::text('business_phone_number', $model->business_phone_number, [
        'class' => 'form-control',
        'id' => $formName . '-business_phone_number',
        'placeholder' => '',
    ]) }}
</div>
<div class="mb-3">
    {{ Form::label('business_address') }}
    {{ Form::text('business_address', $model->business_address, [
        'class' => 'form-control',
        'id' => $formName . '-business_address',
        'placeholder' => '',
    ]) }}
</div>
<div class="mb-3">
    {{ Form::label('salon_type') }}
    {{ Form::select('salon_type', $salon_type, $model->salon_type, [
        'class' => 'form-select',
        'id' => $formName . '-salon_type',
        'placeholder' => '--Select--',
    ]) }}
</div>
<div class="mb-3">
    {{ Form::label('timezone') }}
    {{ Form::select('timezone', $timezone, $model->timezone, [
        'class' => 'form-select select2',
        'id' => $formName . '-timezone',
        'placeholder' => '--Select--',
    ]) }}
</div>
@if ($working_hours)
    <div class="mb-3 table-responsive">
        <table class="table">
            <tbody>
                @foreach ($working_hours as $key => $value)
                    <tr>
                        <td></td>
                        <td>{{ $value['days'] }}
                            {{ Form::hidden('working_hours[' . $key . '][days]', $value['days'], [
                                'class' => 'form-control',
                                'id' => $formName . '-working_hours-days-' . $key,
                                'placeholder' => '',
                            ]) }}
                        </td>
                        <td>{{ Form::time('working_hours[' . $key . '][start_time]', '', [
                            'class' => 'form-control',
                            'id' => $formName . '-working_hours-start_time-' . $key,
                            'placeholder' => '',
                        ]) }}
                        </td>
                        <td>{{ Form::time('working_hours[' . $key . '][end_time]', '', [
                            'class' => 'form-control',
                            'id' => $formName . '-working_hours-end_time-' . $key,
                            'placeholder' => '',
                        ]) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
<div class="float-end">
    {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => $formName . '-submit']) }}
    {{ Form::button('Close', ['type' => 'button','class' => 'btn btn-secondary','id' => $formName . '-close','data-bs-dismiss' => 'modal']) }}
</div>
{{ Form::close() }}

{!! JsValidator::formRequest('App\Http\Requests\Admin\SalonRequest', '#gridview-form') !!}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".select2").select2({
        placeholder: '--Select--',
        allowClear: true,
        dropdownParent: $("#gridviewModal"),
        width: "100%",
    });
    $(document).ready(function() {
        $('#salonform-business_phone_number').inputmask({
            mask: "999-999-9999"
        });
        // $(":input").inputmask();
        // Inputmask().mask(document.querySelectorAll("input"));
    });
</script>
