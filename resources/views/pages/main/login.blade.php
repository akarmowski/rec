@extends('layouts.main')

@section('content')

{{ Form::open(array('url' => route('auth.login'), 'method' => 'POST')) }}
        <div class="card-header">
            Logowanie
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
            </div>
            {{ Form::button('Zaloguj', ['class' => 'btn btn-primary mt-3', 'type' => 'submit']) }}
        </div>
    {{ Form::close() }}

@endsection