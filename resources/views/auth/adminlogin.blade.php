@extends('layouts.admin')

@section('content')
<main class="form-signin text-center">
    <h1>Salon</h1>
    <div class="card">
        <div class="card-header">
            {{ __('Login') }}
        </div>
        <div class="card-body">
            {{ Form::open([
            'route' => 'admin.checklogin',
            'class'=>'',
            'id' => 'my-form',
            'name' => 'loginform',
            'enableAjaxSubmit' => 1]) }}
            <div class="mb-3">
                {{ Form::text('email', old('email'), ["class" => "form-control", 'id'=> 'loginform-email', 'placeholder'
                => 'Email',
                'autocomplete' => 'email', 'autofocus' => true]) }}
            </div>
            <div class="mb-3">
                {{ Form::password('password', ["class" => "form-control", 'id'=> 'loginform-password', 'placeholder' =>
                'Password']) }}
            </div>
            <div id="formerror" class="formerror"></div>
            <div class="row flex-between-center">
                <div class="col-auto">
                    {{ Form::checkbox('remember', '', old('remember') ? true : false, ['class' => 'form-check-input',
                    'id' => 'loginform-remember']); }}
                    {{ Form::label('loginform-remember', 'Remember Me', ['class'=>'ms-1']); }}
                </div>
            </div>
            <div class="mb-3">
                {{ Form::button('Login', ['type'=>'submit','class' => 'btn btn-primary d-block w-100 mt-3',
                'id' => 'loginform-submit']); }}
            </div>
            {{ Form::close() }}

            <div class="col-auto">
                @if (Route::has('password.request'))
                <a class="fs--1" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </div>
</main>
@section('pagescript')
{!! JsValidator::formRequest('App\Http\Requests\AdminLoginRequest', '#my-form'); !!}
@endsection
{{-- <section class="vh-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.checklogin') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection
