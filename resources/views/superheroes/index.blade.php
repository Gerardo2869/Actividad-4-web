<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Superhéroes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow-sm rounded">
        <h1 class="mb-4 text-center">Superhéroes</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Poder</th>
                    <th>Origen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($superheroes as $superhero)
                <tr>
                    <td>{{ $superhero->id }}</td>
                    <td>{{ $superhero->name }}</td>
                    <td>{{ $superhero->powers }}</td> <!-- Aquí cambiamos de "power" a "powers" -->
                    <td>{{ $superhero->origin }}</td>
                    <td>
                            <a href="{{ route('superheroes.show', $superhero->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                            <a href="{{ route('superheroes.edit', $superhero->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                            <form action="{{ route('superheroes.destroy', $superhero->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este superhéroe?')">Eliminar</button>
                            </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="{{ route('superheroes.create') }}" class="btn btn-primary">Agregar Superhéroe</a>
        </div>
    </div>
</body>
</html>