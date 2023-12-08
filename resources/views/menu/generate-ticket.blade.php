<!-- resources/views/menu/generate-ticket.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generar Ticket</title>
</head>
<body>
    <h1>Detalles del Ticket</h1>
    <p>Número de Pedido: {{ $paymentDetails['payment_id'] }}</p>
    <p>Estado del Pago: {{ $paymentDetails['payment_status'] }}</p>
    <p>Monto: {{ $paymentDetails['amount'] }}</p>
    <!-- Agrega más detalles según sea necesario -->
</body>
</html>
