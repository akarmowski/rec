@extends('layouts.main')

@section('page_content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-envelope"></i> Zarządzanie kontaktami</h1>
    <hr>

    <section class="actions">
        <a href="{{ route('contacts.import') }}" class="btn btn-success">Importuj dane</a>
    </section>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="navigation-index">
            <thead>
                <tr>
                    <th>Imię i Nazwisko</th>
                    <th>Płeć</th>
                    <th>Kraj</th>
                    <th>Email</th>
                    <th>IP Adres</th>
                    {{-- <th>Operacje</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $item)
                    <tr>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>@if ($item->gender == 'Male') Mężczyzna @elseif ($item->gender == 'Female') Kobieta @endif</td>
                        <td>{{ $item->country }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->ip_address }}</td>
                        {{-- <td>
                            <a href="{{ route('contacts.edit', $item->id) }}" class="btn btn-primary">Edycja</a>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Brak danych</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<div class="text-center">{{ $contacts->links() }}</div>

@endsection