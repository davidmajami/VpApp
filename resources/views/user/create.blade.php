@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-4">Kreirajte korisnika</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $e)
               <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="d-flex justify-content-center w-100">
        <form class="col-md-4" action="{{route('users.store')}}"  method="POST">
            @csrf 
            <div class="form-group">
                <label for="">Ime:</label>
                <input type="text" class="form-control"  name="ime">
            </div>
            <div class="form-group">
                <label for="">Prezime:</label>
                <input type="text" class="form-control" name="prezime">
            </div>
            <div class="form-group">
                <label for="">Jmbg:</label>
                <input type="text" class="form-control"  name="jmbg">
            </div>
            <div class="form-group">
                <label for="">Telefon:</label>
                <input type="text" class="form-control" name="telefon">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Adresa:</label>
                <input type="text" class="form-control" name="adresa">
            </div>
            <div class="form-group">
                <label for="">Username:</label>
                <input type="text" class="form-control"  name="username">
            </div>
            <div class="form-group">
                <label for="">Lozinka:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Potvrdi lozinku:</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="">Uloga:</label>
                    <select class="form-control" name="uloga">
                        <option value="admin">admin</option>
                        <option value="zaposleni">zaposleni</option>
                        <option value="kupac">kupac</option>
                    </select> 
            </div>
            <div class="d-flex justify-content-center mt-2 p-2 gap-3">
                <button class="btn btn-success ">Kreiraj</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Otkazi</a>
            </div>
        </form>
    </div>
@endsection
