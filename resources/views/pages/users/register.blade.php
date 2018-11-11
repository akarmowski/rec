@extends('layouts.main')

@section('content')

{{ Form::open(array('url' => route('users.store'), 'method' => 'POST')) }}
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

@endsection