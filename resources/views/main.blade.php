<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Main Panel</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="panel-container">
    <h2>Vp Sistem</h2>
    <div class="buttons-container">
        <button onclick="location.href='{{ route('proizvods.index') }}'">Proizvodi</button>
        <button onclick="location.href='{{ route('grupa_proizvodas.index') }}'">Grupe proizvoda</button>
        
        
        @if(auth()->user() && auth()->user()->uloga === 'admin')
            <button onclick="location.href='{{ route('users.index') }}'">Zaposleni</button>
        @endif

        <button onclick="location.href='{{ route('narudzbinas.index') }}'">Narudžbine</button>
    </div>
    <div class="logout-container">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
      </form>
    </div>
  </div>
</body>
</html>
