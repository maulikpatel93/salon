@php
    use App\Models\Roles;
    $title_single = 'user';
    $unique_title = str_replace(' ', '_', strtolower($title_single)); //without space
    $formName = $title_single.'form';
    $formRoute = (!$model->id) ? route('admin.users.store') : route('admin.users.update', ['id' => encode($model->id)]);
    $roles = Roles::where('is_active', '1')->get()->pluck('name', 'id')->toArray();
@endphp
{{ Form::open([
    'url' => $formRoute,
    'class'=>'',
    'id' => 'gridview-form',
    'name' => $formName,
    'modal' => 1,
    'loader' => $unique_title,
    'enableAjaxSubmit' => 1]) }}
    <div id="formerror" class="formerror"></div>
    <div class="mb-3">
        {{ Form::label('first_name'); }}
        {{ Form::text('first_name', $model->first_name, [
        "class" => "form-control",
        'id'=> $formName.'-first_name',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('last_name'); }}
        {{ Form::text('last_name', $model->last_name, [
        "class" => "form-control",
        'id'=> $formName.'-last_name',
        'placeholder'=> '',
        ]) }}
    </div>
    @if(!$model->id)
        <div class="mb-3">
            {{ Form::label('username'); }}
            {{ Form::text('username', $model->username, [
            "class" => "form-control",
            'id'=> $formName.'-username',
            'placeholder'=> '',
            ]) }}
        </div>
        <div class="mb-3">
            {{ Form::label('email'); }}
            {{ Form::text('email', $model->email, [
            "class" => "form-control",
            'id'=> $formName.'-email',
            'placeholder'=> '',
            ]) }}
        </div>
        <div class="mb-3">
            {{ Form::label('password'); }}
            {{ Form::text('password', $model->password, [
            "class" => "form-control",
            'id'=> $formName.'-password',
            'placeholder'=> '',
            ]) }}
        </div>
        <div class="mb-3">
            {{ Form::label('confirm password'); }}
            {{ Form::text('password_confirmation', '', [
            "class" => "form-control",
            'id'=> $formName.'-password_confirmation',
            'placeholder'=> '',
            ]) }}
        </div>
    @endif
    <div class="mb-3">
        {{ Form::label('phone_number'); }}
        {{ Form::text('phone_number', $model->phone_number, [
        "class" => "form-control",
        'id'=> $formName.'-phone_number',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="mb-3">
        {{ Form::label('role'); }}
        {{ Form::select('role_id', $roles, $model->role_id, [
        "class" => "form-select",
        'id'=> $formName.'-role_id',
        'placeholder'=> '',
        ]) }}
    </div>
    <div class="float-end">
        {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary',
            'id' => $formName.'-submit']); }}
        {{ Form::button('Close', ['type'=>'button','class' => 'btn btn-secondary',
            'id' => $formName.'-close', 'data-bs-dismiss' => 'modal']); }}
    </div>
    {{ Form::close() }}

    {!! JsValidator::formRequest('App\Http\Requests\Admin\UserRequest', '#gridview-form'); !!}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>