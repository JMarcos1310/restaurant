<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
</head>
<body>
    <h1>Ingredientes</h1>
    <ul>
        @foreach ($ingredients as $ingredient)
            <li>{{ $ingredient->Name }} - Precio: ${{ $ingredient->PricePerKilo }}</li>
        @endforeach
    </ul>
</body>
</html>
