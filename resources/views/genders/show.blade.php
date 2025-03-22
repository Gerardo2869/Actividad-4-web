<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Género</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="max-w-2xl mx-auto p-6 mt-10 bg-white shadow-lg rounded-xl">
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Detalles del Género</h1>

        <div class="text-lg mb-4"><strong>ID:</strong> {{ $gender->id }}</div>
        <div class="text-lg mb-4"><strong>Nombre:</strong> {{ $gender->name }}</div>

        <div class="text-center mt-6">
            <a href="{{ route('genders.index') }}" class="text-blue-500 hover:text-blue-700 transition">Volver a la lista</a>
        </div>
    </div>
</body>
</html>
