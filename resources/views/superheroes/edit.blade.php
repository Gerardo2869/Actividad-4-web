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
                <label for="real_name" class="form-label">Nombre Real</label>
                <input type="text" name="real_name" id="real_name" value="{{ $superhero->real_name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="powers" class="form-label">Poderes</label>
                <textarea name="powers" id="powers" class="form-control" required>{{ $superhero->powers }}</textarea>
            </div>

            <div class="mb-3">
                <label for="affiliation" class="form-label">Afiliación</label>
                <input type="text" name="affiliation" id="affiliation" value="{{ $superhero->affiliation }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="universe_id" class="form-label">Universo</label>
                <select name="universe_id" id="universe_id" class="form-control" required>
                    <option value="">Seleccione un universo</option>
                    @foreach ($universes as $universe)
                        <option value="{{ $universe->id }}" {{ $superhero->universe_id == $universe->id ? 'selected' : '' }}>
                            {{ $universe->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo de Superhéroe</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    <option value="">Seleccione un tipo</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $superhero->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="gender_id" class="form-label">Género</label>
                <select name="gender_id" id="gender_id" class="form-control" required>
                    <option value="">Seleccione un género</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}" {{ $superhero->gender_id == $gender->id ? 'selected' : '' }}>
                            {{ $gender->name }}
                        </option>
                    @endforeach
                </select>
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
