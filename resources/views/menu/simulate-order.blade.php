@extends('layouts.template')

@section('content')
    <div class="container">
        <h1 class="my-4">Simular Pedido</h1>
        <div class="alert alert-info">
            <p>Simula la experiencia de realizar un pedido.</p>
        </div>
        {{-- Formulario para simular el pedido --}}
        <form>
            {{-- Campos del formulario (personaliza según tus necesidades) --}}
            <button type="submit" class="btn btn-success">Realizar Pedido</button>
        </form>
    </div>
@endsection
