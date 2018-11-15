@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

{{-- @section('body')

{{ Form::open(array('url' => route('main.store_user'), 'method' => 'POST')) }}
        <div class="card-header">
            Rejestracja
        </div>
        <div class="card-body">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    {{ Form::label('email', 'Email', ['class' => 'col-sm-10 control-label']) }}
                    {{ Form::email('email', '', array('class' => 'form-control', 'autocomplete' => 'off')) }}    
                </div>
                <div class="col-auto">
                    {{ Form::label('password', 'Hasło', ['class' => 'col-sm-10 control-label']) }}
                    {{ Form::password('password', array('class' => 'form-control', 'autocomplete' => 'off')) }}    
                </div>
                <div class="col-auto">
                    {{ Form::label('password_confirm', 'Powtórz hasło', ['class' => 'col-sm-10 control-label']) }}
                    {{ Form::password('password_confirm', array('class' => 'form-control', 'autocomplete' => 'off')) }}    
                </div>
                <div class="col-auto">
                    {{ Form::label('first_name', 'Imię', ['class' => 'col-sm-10 control-label']) }}
                    {{ Form::text('first_name', '', array('class' => 'form-control', 'autocomplete' => 'off')) }}    
                </div>
                <div class="col-auto">
                    {{ Form::label('last_name', 'Nazwisko', ['class' => 'col-sm-10 control-label']) }}
                    {{ Form::text('last_name', '', array('class' => 'form-control', 'autocomplete' => 'off')) }}    
                </div>
                <div class="col-auto">
                    {{ Form::label('gender', 'Płeć', ['class' => 'col-sm-12 control-label']) }}
                    {{ Form::select('gender', [
                        'man' => 'Mężczyzna',
                        'woman' => 'Kobieta',
                    ], '', ['class' => 'form-control', 'placeholder' => 'Płeć']) }}
                </div>
            </div>
            {{ Form::button('Zarejestruj', ['class' => 'btn btn-primary mt-3', 'type' => 'submit']) }}
        </div>
    {{ Form::close() }}

@endsection --}}

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Rejestracja nowego użytkownika</p>
            {{ Form::open(array('url' => route('main.store_user'), 'method' => 'POST')) }}
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    {{ Form::text('first_name', old('first_name'), array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Imię')) }}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    {{ Form::text('last_name', old('last_name'), array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Nazwisko')) }}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
                    {{ Form::select('gender', [
                        'man' => 'Mężczyzna',
                        'woman' => 'Kobieta',
                    ], old('gender'), ['class' => 'form-control', 'placeholder' => 'Płeć']) }}
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    {{ Form::email('email', old('email'), array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Email')) }}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    {{ Form::password('password', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Hasło')) }}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirm') ? 'has-error' : '' }}">
                    {{ Form::password('password_confirm', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Powtórz hasło')) }}
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirm'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirm') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >Zarejestruj</button>
            {{ Form::close() }}
            {{-- <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div> --}}
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop