@extends('layouts.main')

@section('page_content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-newspaper-o"></i> Zarządzanie użytkownikami</h1>
    <hr>

    <section class="actions">
        <a href="{{ route('users.create') }}" class="btn btn-success">Dodaj uzytkownika</a>
    </section>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="navigation-index">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email (Login)</th>
                    <th>Imię i Nazwisko</th>
                    <th>Płeć</th>
                    <th>Aktywny</th>
                    <th>Data dodania</th>
                    <th>Operacje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>@if ($item->gender == 'man') Mężczyzna @elseif ($item->gender == 'woman') Kobieta @endif</td>
                        <td>@if($item->is_active == 1) Tak @elseif($item->is_active == 0) Nie @endif</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edycja</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div class="text-center">{{ $users->links() }}</div>

@endsection