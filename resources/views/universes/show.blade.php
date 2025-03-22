<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Universo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">🌌 {{ $universe->name }}</h1>
        <p class="text-gray-700 text-lg mb-4">{{ $universe->description }}</p>
        <div class="flex justify-between">
            <a href="{{ route('universes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-700">⬅ Volver</a>
            <a href="{{ route('universes.edit', $universe->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700">✏ Editar</a>
        </div>
    </div>
</body>
</html>
