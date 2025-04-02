<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Superhéroe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="bg-white shadow-md rounded p-4 w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">{{ $superhero->name }}</h2>
        <p><strong>Nombre Real:</strong> {{ $superhero->real_name }}</p>
        <p><strong>Poderes:</strong> {{ $superhero->powers }}</p>
        <p><strong>Afiliación:</strong> {{ $superhero->affiliation }}</p>
        <p><strong>Universo:</strong> {{ $superhero->universe->name ?? 'Desconocido' }}</p>
        <p><strong>Tipo:</strong> {{ $superhero->type->name ?? 'Desconocido' }}</p>
        <p><strong>Género:</strong> {{ $superhero->gender->name ?? 'Desconocido' }}</p>

        <div class="text-center mt-4">
            <a href="{{ route('superheroes.edit', $superhero->id) }}" class="btn btn-warning me-2">Editar</a>
            <a href="{{ route('superheroes.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</body>
</html>
