<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
  <header>
    <h1>Restaurante </h1>
    <p>Bienvenido a una experiencia gastronómica única</p>
</header>

<nav>
    <a href="/">Inicio      </a> |
    <a href="/menu">Menú        </a> |
    <a href="/reservaciones"> Reservas    </a> |
    <a href="#">Contacto    </a>
    <a href="/warehouses">Estantes</a>
</nav>

<footer>
  <p>&copy; 2023 Restaurante J.M.V.A</p>
</footer>

    @yield('content')
</body>
</html>