@extends('layouts.main')

@section('title', 'News')

@section('page_content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-newspaper-o"></i> Zarządzanie newsami</h1>
        <hr>

        <section class="actions">
            <a href="{{ route('news.create') }}" class="btn btn-success">Dodaj News</a>
        </section>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="navigation-index">
                <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Data dodania</th>
                        <th>Data aktualizacji</th>
                        <th>Autor</th>
                        <th>Aktywny</th>
                        <th>Operacje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{{ $item->author->first_name }} {{ $item->author->last_name }}</td>
                            <td>@if($item->is_active == 1) Tak @elseif($item->is_active == 0) Nie @endif</td>
                            <td>
                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary">Edycja</a>
                                <a href="{{ route('news.delete', $item->id) }}" class="btn btn-danger">Usuń</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="text-center">{{ $news->links() }}</div>

@endsection