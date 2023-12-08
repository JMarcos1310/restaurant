<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estanterías</title>
</head>
<body>
    <h1>Estanterías</h1>
    <ul>
        @foreach ($shelves as $shelf)
            <li><a href="/shelves/{{ $shelf->ID }}/ingredients">{{ $shelf->Letter }}</a></li>
        @endforeach
    </ul>
</body>
</html>
