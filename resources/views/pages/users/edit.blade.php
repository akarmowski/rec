@extends('layouts.main')

@section('page_content')

<div class="row">
    <div class='col-lg-6 col-lg-offset-2'>
        <h1><i class='fa fa-user-plus'></i> Edycja użytkownika</h1>
        
        {{ Form::open(array('url' => route('users.update', $user->id), 'method' => 'POST')) }}
            <div class='form-group'>
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', $user->email, array('class' => 'form-control', 'autocomplete' => 'off')) }}
                {{ Form::hidden('user_id', $user->id) }}
            </div>
            <div class='form-group'>
                {{ Form::label('password', 'Hasło') }}
                {{ Form::password('password', array('class' => 'form-control', 'autocomplete' => 'off')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('password_confirm', ' Powtórz hasło') }}
                {{ Form::password('password_confirm', array('class' => 'form-control', 'autocomplete' => 'off')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('is_active', 'Aktywny') }}
                {{ Form::select('is_active', [
                    1 => 'Tak',
                    0 => 'Nie',
                    ], $user->is_active, ['class' => 'form-control', 'placeholder' => 'Aktywny']) 
                }}
            </div>
            <div class='form-group'>
                {{ Form::label('first_name', 'Imię') }}
                {{ Form::text('first_name', $user->first_name, array('class' => 'form-control', 'autocomplete' => 'off')) }} 
            </div>
            <div class='form-group'>
                {{ Form::label('last_name', 'Nazwisko') }}
                {{ Form::text('last_name', $user->last_name, array('class' => 'form-control', 'autocomplete' => 'off')) }} 
            </div>
            <div class='form-group'>
                {{ Form::label('gender', 'Płeć') }}
                {{ Form::select('gender', [
                    'man' => 'Mężczyzna',
                    'woman' => 'Kobieta',
                ], $user->gender, ['class' => 'form-control', 'placeholder' => 'Płeć']) }}
            </div>
            {{ Form::submit('Zapisz', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}

        <hr>
        <div class="text-left"><a href="{{ URL::previous() }}" class="btn btn-default">Wstecz</a></div>
    </div>
</div>
@endsection