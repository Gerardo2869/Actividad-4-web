<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Superhéroes -->
                        <div class="bg-blue-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-semibold text-blue-800 mb-4">🦸‍♂️ Superhéroes</h3>
                            <p class="text-blue-600 mb-4">Gestiona la información de los superhéroes</p>
                            <a href="{{ route('superheroes.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                Ver Superhéroes
                            </a>
                        </div>

                        <!-- Universos -->
                        <div class="bg-purple-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-semibold text-purple-800 mb-4">🌌 Universos</h3>
                            <p class="text-purple-600 mb-4">Administra los universos de superhéroes</p>
                            <a href="{{ route('universes.index') }}" class="btn btn-primary">
                                Ver Universos
                            </a>
                        </div>

                        <!-- Géneros -->
                        <div class="bg-green-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-semibold text-green-800 mb-4">👥 Géneros</h3>
                            <p class="text-green-600 mb-4">Gestiona los géneros de los superhéroes</p>
                            <a href="{{ route('genders.index') }}" class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                                Ver Géneros
                            </a>
                        </div>

                        <!-- Tipos de Superhéroes -->
                        <div class="bg-yellow-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-semibold text-yellow-800 mb-4">⚡ Tipos</h3>
                            <p class="text-yellow-600 mb-4">Administra los tipos de superhéroes</p>
                            <a href="{{ route('superhero-types.index') }}" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-colors">
                                Ver Tipos
                            </a>
                        </div>

                        <!-- Subir Archivos -->
                        <div class="bg-red-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-semibold text-red-800 mb-4">📁 Subir Archivos</h3>
                            <p class="text-red-600 mb-4">Carga archivos al servidor fácilmente.</p>
                            <a href="{{ url('/subir') }}" class="inline-block bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                Subir Archivo
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
