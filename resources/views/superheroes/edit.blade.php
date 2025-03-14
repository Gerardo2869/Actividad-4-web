<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Superhéroe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="bg-white shadow-md rounded p-4 w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Editar Superhéroe</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $superhero->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="power" class="form-label">Poder</label>
                <input type="text" name="power" id="power" value="{{ $superhero->power }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="origin" class="form-label">Origen</label>
                <input type="text" name="origin" id="origin" value="{{ $superhero->origin }}" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('superheroes.index') }}" class="text-primary">Volver a la lista</a>
        </div>
    </div>
</body>
</html>