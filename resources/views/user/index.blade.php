@extends('layouts.app')

@section('content')
<h1 class="text-center">Svi korisnici</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a class="btn btn-primary mb-3" href="{{ route('users.create') }}">Dodaj novog korisnika +</a>

<table class="table">
    <tr>
        <th>Ime</th>
        <th>JMBG</th>
        <th>Username</th>
        <th>Pozicija</th>
        <th colspan="2">Opcije</th>
    </tr>
    @foreach ($users as $u)
    <tr>
        <td>{{ $u->ime }}</td>
        <td>{{ $u->jmbg }}</td>
        <td>{{ $u->username }}</td>
        <td>{{ $u->uloga }}</td>
        <td><a class="btn btn-secondary" href="{{ route('users.edit', [$u->user_id]) }}">Izmeni</a></td>
        <td>
            <form action="{{ route('users.destroy', $u->user_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Obriši</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


<div class="mt-3">
    <a href="{{ route('main') }}" class="btn btn-info">Nazad</a>
</div>

@endsection
