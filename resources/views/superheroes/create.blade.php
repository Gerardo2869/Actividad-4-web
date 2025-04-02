<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Superhéroe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow-sm rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">🦸‍♂️ Crear Superhéroe</h1>
            <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Volver</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superheroes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Superhéroe</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="real_name" class="form-label">Nombre Real</label>
                <input type="text" class="form-control" id="real_name" name="real_name" value="{{ old('real_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="powers" class="form-label">Poderes</label>
                <textarea class="form-control" id="powers" name="powers" rows="3" required>{{ old('powers') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="affiliation" class="form-label">Afiliación</label>
                <input type="text" class="form-control" id="affiliation" name="affiliation" value="{{ old('affiliation') }}" required>
            </div>

            <div class="mb-3">
                <label for="universe_id" class="form-label">Universo</label>
                <select class="form-select" id="universe_id" name="universe_id" required>
                    <option value="">Selecciona un universo</option>
                    @foreach($universes as $universe)
                        <option value="{{ $universe->id }}" {{ old('universe_id') == $universe->id ? 'selected' : '' }}>
                            {{ $universe->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="superhero_type_id" class="form-label">Tipo de Superhéroe</label>
                <select class="form-select" id="superhero_type_id" name="superhero_type_id" required>
                    <option value="">Selecciona un tipo</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('superhero_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="gender_id" class="form-label">Género</label>
                <select class="form-select" id="gender_id" name="gender_id" required>
                    <option value="">Selecciona un género</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                            {{ $gender->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Crear Superhéroe</button>
            </div>
        </form>
    </div>
</body>
</html>