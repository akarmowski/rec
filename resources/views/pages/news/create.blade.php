@extends('layouts.main')

@section('title', 'Create News')

@section('content_header')

@endsection

@section('content')

    <div class='col-lg-8 col-lg-offset-2'>
        <h1><i class='fa fa-newspaper-o'></i> Dodawanie Newsa</h1>
        <hr>
        {{ Form::open(array('url' => route('news.store'), 'method' => 'POST')) }}
            <div class='form-group'>
                {{ Form::label('description', 'Treść') }}
                {{ Form::textarea('description', null, array('class' => 'form-control')) }}
            </div>
        {{ Form::close() }}        
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