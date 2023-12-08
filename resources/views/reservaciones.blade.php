@extends('layouts.template')
@section('title','Reservaciones')
@section('content')


<form action="procesar_reserva.php" method="post">
    <label for="name">Nombre completo:</label>
    <input type="text" id="name" name="name" required>

    <label for="date">Fecha de reserva:</label>
    <input type="date" id="date" name="date" required>

    <label for="people">Número de personas:</label>
    <input type="number" id="people" name="people" min="1" required>

    <label for="phone">Número de teléfono:</label>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Formato: 123-456-7890" required>

    <button type="submit">Realizar Reserva</button>
</form>

@endsection