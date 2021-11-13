@php
    $formname = 'moduleform';
@endphp
{{ Form::open([
    'route' => 'admin.modules.update',
    'class'=>'',
    'id' => 'my-form',
    'name' => $formname,
    'enableAjaxSubmit' => 1]) }}
    <div id="formerror" class="formerror"></div>
    <div class="input-group mb-3">
        {{ Form::text('email', $model->email, [
        "class" => "form-control",
        'id'=> $formname.'-email',
        'placeholder'=> 'Email',
        'autocomplete' => 'email'
        ]) }}
    </div>
    <div class="">
        {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary',
            'id' => $formname.'-submit']); }}
        {{ Form::button('Close', ['type'=>'button','class' => 'btn btn-secondary',
            'id' => $formname.'-close', 'data-bs-dismiss' => 'modal']); }}
    </div>
    {{ Form::close() }}
