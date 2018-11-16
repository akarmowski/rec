@extends('layouts.main2')

@section('content')

<div class="row">

<div class="title m-b-md">
    Newsy
</div>

<div class="col-md-10 col-md-offset-1">

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="navigation-index">
            <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Opis</th>
                    <th>Data dodania</th>
                    <th>Data aktualizacji</th>
                    <th>Autor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ strip_tags($item->description) }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->author->first_name }} {{ $item->author->last_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">{{ $news->links() }}</div>
</div>



</div>
@endsection