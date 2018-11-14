@extends('layouts.main')

@section('title', 'News')

@section('content_header')

@endsection

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-newspaper-o"></i> Zarządzanie newsami</h1>
        <hr>

        <section class="actions">
            <a href="{{ route('news.add') }}" class="btn btn-success">Dodaj News</a>
        </section>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="navigation-index">
                <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Data dodania</th>
                        <th>Data aktualizacji</th>
                        <th>Autor</th>
                        <th>Operacje</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

@endsection