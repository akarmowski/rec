@extends('layouts.main')

@section('page_content')
<div class="row">
    <div class='col-lg-6 col-lg-offset-2'>
        <h1><i class='fa fa-envelope'></i> Import kontaktów</h1>
        
        {{ Form::open(array('url' => route('contacts.store_import'), 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
            <div class='form-group'>
                {{ Form::label('file', 'Plik') }}
                {{ Form::file('file') }}
            </div>
            {{ Form::submit('Importuj', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        
        <hr>
        <div class="text-left"><a href="{{ URL::previous() }}" class="btn btn-default">Wstecz</a></div>
    </div>
    
</div>
@endsection