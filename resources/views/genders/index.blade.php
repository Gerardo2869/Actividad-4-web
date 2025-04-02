<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Géneros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow-sm rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">👥 Géneros</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Inicio</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($genders as $gender)
                <tr>
                    <td>{{ $gender->id }}</td>
                    <td>{{ $gender->name }}</td>
                    <td>
                        <a href="{{ route('genders.edit', $gender->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('genders.destroy', $gender->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este género?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="{{ route('genders.create') }}" class="btn btn-primary">Agregar Género</a>
        </div>
    </div>
</body>
</html>
