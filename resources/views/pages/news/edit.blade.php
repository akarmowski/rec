@extends('layouts.main')

@section('title', 'Create News')

@section('content_header')

@endsection

@section('page_content')

<div class="row">
    <div class='col-lg-8 col-lg-offset-2'>
        <h1><i class='fa fa-newspaper-o'></i>Edycja Newsa</h1>
        
        {{ Form::open(array('url' => route('news.update', $news['id']), 'method' => 'POST')) }}
            <div class='form-group'>
                {{ Form::label('name', 'Tytuł') }}
                {{ Form::text('name', $news['name'], array('class' => 'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('is_active', 'Aktywny') }}
                {{ Form::select('is_active', [
                    '' => 'Wybierz',
                    1 => 'Tak',
                    0 => 'Nie',
                    ], $news['is_active'], ['class' => 'form-control']) 
                }}
            </div>
            <div class='form-group'>
                {{ Form::label('description', 'Opis') }}
                {{ Form::textarea('description', $news['description'], array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Zapisz', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        
        <hr>
        <div class="text-left"><a href="{{ URL::previous() }}" class="btn btn-default">Wstecz</a></div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection