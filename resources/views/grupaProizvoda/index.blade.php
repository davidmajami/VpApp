<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Grupe proizvoda</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            margin: 40px 0 30px 0;
            color: #222;
            font-size: 32px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 30px;
            justify-content: center;
            padding: 0 20px 50px 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 25px 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            color: #111;
        }

        .main-btn {
            padding: 12px 30px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-bottom: 50px;
        }

        .main-btn:hover {
            background: #357ab8;
            transform: translateY(-2px);
        }

        
        
    </style>
</head>
<body>

    <h1>Grupe proizvoda</h1>

    <div class="container">
        <a href="{{ route('proizvodi.poGrupi', 1) }}" class="card">Tanjiri</a>
        <a href="{{ route('proizvodi.poGrupi', 2) }}" class="card">Čaše</a>
        <a href="{{ route('proizvodi.poGrupi', 3) }}" class="card">Lampe</a>
        <a href="{{ route('proizvodi.poGrupi', 4) }}" class="card">Elektronika</a>
        <a href="{{ route('proizvodi.poGrupi', 5) }}" class="card">Bela tehnika</a>
        <a href="{{ route('proizvodi.poGrupi', 6) }}" class="card">Rasveta</a>
    </div>

    <button class="main-btn" onclick="location.href='main'">Glavni meni</button>

</body>
</html>
