<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Almacenes</title>
</head>
<body>
    <h1>Lista de Almacenes</h1>
    <ul>
        @foreach ($warehouses as $warehouse)
            <li><a href="/warehouses/{{ $warehouse->ID }}/shelves">{{ $warehouse->Name }}</a></li>
        @endforeach
    </ul>
</body>
</html>
