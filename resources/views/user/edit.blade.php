@extends('layouts.app')

@section('content')
<h2 class="text-center mb-4">Izmenite korisnika</h2>
@if ($errors->any())
    <div class="alert-danger alert">
        <ul>
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-flex justify-content-center w-100">
    <form class="col-md-4" action="{{ route('users.update', $user->user_id) }}" method="POST">
        @csrf 
        @method('PUT')

        <div class="form-group">
            <label for="">Ime:</label>
            <input type="text" class="form-control" value="{{ $user->ime }}" name="ime">
        </div>

        <div class="form-group">
            <label for="">Jmbg:</label>
            <input type="text" class="form-control" value="{{ $user->jmbg }}" name="jmbg">
        </div>

        <div class="form-group">
            <label for="">Username:</label>
            <input type="text" class="form-control" value="{{ $user->username }}" name="username">
        </div>

        <div class="form-group">
            <label for="">Tip korisnika:</label>
            <select class="form-control" name="uloga">
                <option selected value="{{ $user->uloga }}">{{ $user->uloga }}</option>
            </select>  
        </div>

        <div class="d-flex justify-content-center mt-2 p-2 gap-3">
            <button class="btn btn-success">Izmeni</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger">Otkaži</a>
        </div>
    </form>
</div>
@endsection
