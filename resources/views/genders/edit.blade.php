<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Género</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="max-w-2xl mx-auto p-6 mt-10 bg-white shadow-lg rounded-xl">
        <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Editar Género</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('genders.update', $gender->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">Nombre del Género</label>
                <input type="text" name="name" id="name" value="{{ $gender->name }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-6 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition">Actualizar</button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('genders.index') }}" class="text-blue-500 hover:text-blue-700 transition">Volver a la lista</a>
        </div>
    </div>
</body>
</html>
