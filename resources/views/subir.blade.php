<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Archivo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="text-center">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Sube tu archivo</h3>

                        <!-- Mensaje de éxito -->
                        @if(session('success'))
                            <div class="mt-6 p-4 bg-green-500 text-white rounded-lg">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                        
                        <!-- Mensaje de error -->
                        @if(session('error'))
                            <div class="mt-6 p-4 bg-red-500 text-white rounded-lg">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        <!-- Formulario de subida -->
                        <form action="{{ route('archivo.subir') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            
                            <!-- Input de archivo -->
                            <div>
                                <label for="archivo" class="block text-lg font-medium text-gray-700">Selecciona un archivo</label>
                                <input type="file" name="archivo" id="archivo" class="mt-2 p-3 w-full border border-gray-300 rounded-lg" required>
                            </div>

                            <!-- Botón de subir -->
                            <div>
                                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                                    Subir Archivo
                                </button>
                            </div>
                        </form>

                        <!-- Enlace para descargar el archivo después de subir -->
                        @if(session('archivo'))
                            <div class="mt-4">
                                <a href="{{ url('storage/' . session('archivo')) }}" 
                                   class="inline-block py-3 px-6 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                                   Descargar Archivo
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
