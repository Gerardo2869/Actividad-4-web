<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Género</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow-sm rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Crear Nuevo Género</h1>
            <a href="{{ route('genders.index') }}" class="btn btn-secondary">Volver</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('genders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Género</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Crear Género</button>
            </div>
        </form>
    </div>
</body>
</html>
