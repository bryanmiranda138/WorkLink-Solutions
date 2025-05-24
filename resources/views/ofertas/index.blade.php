<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Ofertas realizadas') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Lista de Ofertas</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <th class="px-4 py-2 border-b">Título</th>
                            <th class="px-4 py-2 border-b">Fecha de Publicación</th>
                            <th class="px-4 py-2 border-b">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ofertas as $oferta)
                            <tr class="text-gray-700 dark:text-gray-300 text-center">
                                <td class="px-4 py-2 border-b">{{ $oferta->tituloOferta }}</td>
                                <td class="px-4 py-2 border-b">{{ $oferta->fechaPublicacion }}</td>
                                <td class="px-4 py-2 border-b space-x-2">
                                    <a href="{{ route('ofertas.edit', $oferta) }}" 
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        Editar
                                    </a>
                                    <form action="{{ route('ofertas.destroy', $oferta) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta oferta?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                    No hay ofertas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
