<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Universo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">✏ Editar Universo</h1>

        <!-- Formulario de edición -->
        <form action="{{ route('universes.update', $universe->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" value="{{ $universe->name }}" required>
            </div>

            <!-- Campo Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded" required>{{ $universe->description }}</textarea>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('universes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-700">⬅ Volver</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700">💾 Guardar Cambios</button>
            </div>
        </form>
    </div>
</body>
</html>
