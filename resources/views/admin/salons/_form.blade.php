@php
    $title_single = 'salon';
    $unique_title = str_replace(' ', '_', strtolower($title_single)); //without space
    $formName = $title_single.'form';
    $formRoute = (!$model->id) ? route('admin.salons.store') : route('admin.salons.update', ['id' => encode($model->id)]);
    $salon_type = [
        'Unisex' => 'Unisex', 
        'Ladies' => 'Ladies', 
        'Gents' => 'Gents'
    ];
    $timezone = config('params.timezones');
@endphp
{{ Form::open([
    'url' => $formRoute,
    'class'=>'',
    'id' => 'gridview-form',
    'name' => $formName,
    'modal' => 1,
    'loader' => $unique_title,
    'files' => true,
    'enableAjaxSubmit' => 1]) }}
    <div id="formerror" class="formerror"></div>
    <div class="mb-3">
        {{ Form::label('business_name'); }}
        {{ Form::text('business_name', $model->business_name, [
        "class" => "form-control",
        'id'=> $formName.'-business_name',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('logo'); }}
        {{ Form::file('logo', [
        'id'=> $formName.'-logo',
        'accept'=>"image/*"
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('owner_name'); }}
        {{ Form::text('owner_name', $model->owner_name, [
        "class" => "form-control",
        'id'=> $formName.'-owner_name',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('business_email'); }}
        {{ Form::text('business_email', $model->business_email, [
        "class" => "form-control",
        'id'=> $formName.'-business_email',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('business_phone_number'); }}
        {{ Form::text('business_phone_number', $model->business_phone_number, [
        "class" => "form-control",
        'id'=> $formName.'-business_phone_number',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('business_address'); }}
        {{ Form::text('business_address', $model->business_address, [
        "class" => "form-control",
        'id'=> $formName.'-business_address',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('salon_type'); }}
        {{ Form::select('salon_type', $salon_type, $model->salon_type, [
        "class" => "form-select",
        'id'=> $formName.'-salon_type',
        'placeholder'=> '--Select--',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('timezone'); }}
        {{ Form::select('timezone', $timezone, $model->timezone, [
        "class" => "form-select select2",
        'id'=> $formName.'-timezone',
        'placeholder'=> '--Select--',
        ]) }}
    </div>
    <div class="float-end">
        {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary',
            'id' => $formName.'-submit']); }}
        {{ Form::button('Close', ['type'=>'button','class' => 'btn btn-secondary',
            'id' => $formName.'-close', 'data-bs-dismiss' => 'modal']); }}
    </div>
    {{ Form::close() }}

    {!! JsValidator::formRequest('App\Http\Requests\Admin\SalonRequest', '#gridview-form'); !!}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".select2").select2({
            placeholder:'--Select--',
            allowClear:true,
            dropdownParent: $("#gridviewModal"),
            width: "100%",
        });
        $(document).ready(function(){
            $('#salonform-business_phone_number').inputmask({mask: "999-999-9999"});
            // $(":input").inputmask();
            // Inputmask().mask(document.querySelectorAll("input"));
        });
    </script>