<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú</title>
    <link rel="stylesheet" href="{{ asset('css/menu-style.css') }}">
    <!-- Agrega SweetAlert para la ventana emergente -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    @extends('layouts.template')

@section('title', 'Menú')

@section('content')
    <div class="container">
        <h1 class="my-4">Menú</h1>
        <div class="row">
            @foreach ($dishes as $dish)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        <img src="{{ $dish->Url }}" class="card-img-top img-thumbnail" alt="{{ $dish->Name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->Name }}</h5>
                            <p class="card-text">{{ $dish->Type }}</p>
                            <p class="card-text">${{ $dish->Price }}</p>
                            <!-- Agrega el botón de compra con la ventana emergente -->
                            <button class="btn btn-primary" onclick="mostrarPopupDePago('{{ $dish->Name }}', '{{ $dish->Price }}')">Comprar</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Script para mostrar la ventana emergente de pago -->
    <script>
        function mostrarPopupDePago(nombrePlatillo, precioPlatillo) {
            Swal.fire({
                title: 'Simulación de Pago',
                html:
                    '<input type="text" id="nombreCliente" class="swal2-input" placeholder="Nombre del Cliente">' +
                    '<input type="text" id="numeroTarjeta" class="swal2-input" placeholder="Número de Tarjeta">' +
                    '<input type="text" id="fechaVencimiento" class="swal2-input" placeholder="Fecha de Vencimiento (MM/YY)">',
                confirmButtonText: 'Pagar',
                preConfirm: () => {
                    // Lógica para procesar el pago (simulado con formulario POST)
                    const nombre = document.getElementById('nombreCliente').value;
                    const numeroTarjeta = document.getElementById('numeroTarjeta').value;
                    const fechaVencimiento = document.getElementById('fechaVencimiento').value;

                    // Simulación de procesamiento de pago exitoso
                    const detallesPago = {
                        estado_pago: 'éxito',
                        id_pago: Math.random().toString(36).substring(7),
                        monto: precioPlatillo,
                        nombre_platillo: nombrePlatillo,
                        tipo_tarjeta: 'Visa', // Puedes personalizar según tus necesidades
                    };

                    // Crear un formulario y enviar datos mediante POST
                    const formulario = document.createElement('form');
                    formulario.method = 'POST';
                    formulario.action = '/menu/procesar-pago-con-tarjeta';

                    // Agregar campos ocultos para enviar datos del formulario
                    const campoOculto1 = document.createElement('input');
                    campoOculto1.type = 'hidden';
                    campoOculto1.name = 'nombre';
                    campoOculto1.value = nombre;
                    formulario.appendChild(campoOculto1);

                    const campoOculto2 = document.createElement('input');
                    campoOculto2.type = 'hidden';
                    campoOculto2.name = 'numeroTarjeta';
                    campoOculto2.value = numeroTarjeta;
                    formulario.appendChild(campoOculto2);

                    const campoOculto3 = document.createElement('input');
                    campoOculto3.type = 'hidden';
                    campoOculto3.name = 'fechaVencimiento';
                    campoOculto3.value = fechaVencimiento;
                    formulario.appendChild(campoOculto3);

                    const campoOculto4 = document.createElement('input');
                    campoOculto4.type = 'hidden';
                    campoOculto4.name = '_token'; // Agrega el token CSRF si es necesario
                    campoOculto4.value = '{{ csrf_token() }}';
                    formulario.appendChild(campoOculto4);

                    // Enviar formulario
                    document.body.appendChild(formulario);
                    formulario.submit();
                }
            });
        }
    </script>
@endsection

</body>
</html>
