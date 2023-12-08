@extends('layouts.template')
@section('title','home')
@section('content')



    
<section>
  <h2>Conoce nuestro menú</h2>
  <p>Nuestro chef ofrece una exquisita selección de platos preparados con ingredientes frescos y de alta calidad.</p>
  <p>Descubre nuestra carta y disfruta de una experiencia culinaria inolvidable.</p>
</section>

<form action="">
  <label for="name">Nombre</label>
  <input type="text" id="name" name="name" required>
  <!-- Agrega más campos según tus necesidades -->
  <button type="submit">Enviar Reserva</button>
</form>

<section>
  <h2>Reserva tu mesa</h2>
  <p>Realiza una reserva para asegurarte de tener un lugar en nuestro acogedor restaurante.</p>
  <p>Contáctanos para más detalles y consulta la disponibilidad.</p>
</section>

<form action="">
  <label for="name">Nombre</label>
  <input type="text" id="name" name="name" required>
  <!-- Agrega más campos según tus necesidades -->
  <button type="submit">Enviar Reserva</button>
</form>



@endsection