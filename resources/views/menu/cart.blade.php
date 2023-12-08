<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de Compras</title>
</head>
<body>
    @extends('layouts.template')

@section('title', 'Carrito')

@section('content')
    <div class="container">
        <h1 class="my-4">Carrito de Compras</h1>
        <div class="row">
            @if (!empty($cartItems))
                <ul class="list-group">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartItems as $item)
                        <li class="list-group-item">
                            <span>{{ $item->name }}</span>
                            <span class="float-right">${{ $item->price }}</span>
                            <br>
                            <span>Cantidad: {{ $item->quantity }}</span>
                            <br>
                            <span>Subtotal: ${{ $item->price * $item->quantity }}</span>
                            @php
                                $total += $item->price * $item->quantity;
                            @endphp
                        </li>
                    @endforeach
                </ul>
                <p class="mt-3">Total a Pagar: ${{ $total }}</p>
                <form action="{{ route('menu.processCardPayment') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3">Procesar Pago con Tarjeta</button>
                </form>
            @else
                <p class="text-muted">El carrito está vacío.</p>
            @endif
        </div>
    </div>
@endsection

</body>
</html>
