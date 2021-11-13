@php
    $formname = 'moduleform';
    echo '<pre>'; print_r($model->id); echo '<pre>';dd();

@endphp
{{ Form::open([
    'route' => 'admin.modules.update',
    'class'=>'',
    'id' => 'my-form',
    'name' => $formname,
    'enableAjaxSubmit' => 1]) }}
    <div id="formerror" class="formerror"></div>

    <div class="input-group mb-3">
        {{ Form::text('email', old('email'), [
        "class" => "form-control",
        'id'=> $formname.'-email',
        'placeholder'=> 'Email',
        'autocomplete' => 'email',
        ]) }}
    </div>
    <div class="row">
        <div class="col-12">
            {{ Form::button('Login', ['type'=>'submit','class' => 'btn btn-primary d-block w-100 mt-3',
            'id' => $formname.'-submit']); }}
        </div>
    </div>
    {{ Form::close() }}
