<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Universos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }
        .btn-apple {
            background: linear-gradient(to right, #007AFF, #0A84FF);
            color: white;
            padding: 10px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .btn-apple:hover {
            background: linear-gradient(to right, #005FCC, #007AFF);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-4xl glassmorphism">
        <h1 class="text-4xl font-semibold text-center mb-6">🌌 Universos</h1>

        <div class="overflow-hidden rounded-xl shadow-lg bg-white">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-4 text-lg">ID</th>
                        <th class="p-4 text-lg">Nombre</th>
                        <th class="p-4 text-lg text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach($universes as $universe)
                    <tr class="hover:bg-gray-200 transition">
                        <td class="p-4 text-gray-700">{{ $universe->id }}</td>
                        <td class="p-4 text-gray-700 font-medium">{{ $universe->name }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('universes.show', $universe->id) }}" class="text-green-600 hover:text-green-800 transition mr-4">Ver</a>
                            <a href="{{ route('universes.edit', $universe->id) }}" class="text-blue-600 hover:text-blue-800 transition mr-4">Editar</a>
                            <form action="{{ route('universes.destroy', $universe->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition" onclick="return confirm('¿Seguro que deseas eliminar este universo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('universes.create') }}" class="btn-apple shadow-md">+ Agregar Universo</a>
        </div>
    </div>
</body>
</html>
