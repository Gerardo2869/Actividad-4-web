<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Universos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; 
            background-color: #f5f5f7; 
            color: #1d1d1f;
        }
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
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-2xl glassmorphism">
        <h1 class="text-3xl font-semibold text-center mb-6">🌌 Universos</h1>

        <table class="w-full border-separate border-spacing-y-2">
            <thead>
                <tr class="text-gray-700">
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Nombre</th>
                    <th class="p-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($universes as $universe)
                <tr class="bg-white shadow-md rounded-lg">
                    <td class="p-4 rounded-l-lg">{{ $universe->id }}</td>
                    <td class="p-4">{{ $universe->name }}</td>
                    <td class="p-4 flex justify-center space-x-3 rounded-r-lg">
                        <a href="{{ route('universes.edit', $universe->id) }}" class="text-yellow-500 hover:text-yellow-600">Editar</a>
                        <form action="{{ route('universes.destroy', $universe->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('¿Seguro que deseas eliminar este universo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-6">
            <a href="{{ route('universes.create') }}" class="btn-apple shadow-md">+ Agregar Universo</a>
        </div>
    </div>
</body>
</html>