<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Universos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow-sm rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">🌌 Universos</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Inicio</a>
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
                @foreach($universes as $universe)
                <tr>
                    <td>{{ $universe->id }}</td>
                    <td>{{ $universe->name }}</td>
                    <td>
                        <a href="{{ route('universes.show', $universe->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('universes.edit', $universe->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('universes.destroy', $universe->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este universo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="{{ route('universes.create') }}" class="btn btn-primary">Agregar Universo</a>
        </div>
    </div>
</body>
</html>
