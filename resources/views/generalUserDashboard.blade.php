<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuario: Postulante') }}
        </h2>
    </x-slot>

    @if (Auth::user()->type == 0 && isset($postulante))
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Ofertas disponibles</h1>

            @if ($ofertas->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($ofertas as $oferta)
                <div x-data="{ open: false }" class="bg-white dark:bg-gray-900 shadow rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                        {{ $oferta->tituloOferta }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3">
                        {{ Str::limit($oferta->descOferta, 100) }}
                    </p>
                    <button @click="open = true"
                        class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-semibold">
                        Ver más
                    </button>

                    <!-- Modal -->
                    <div x-show="open" @keydown.escape.window="open = false"
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
                        style="display: none;">
                        <div @click.away="open = false"
                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">{{ $oferta->tituloOferta }}</h2>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Descripción:</strong> {{ $oferta->descOferta }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Requisitos:</strong> {{ $oferta->requisitos }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Salario:</strong> {{ $oferta->salario }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Modalidad:</strong> {{ $oferta->modalidad }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Ubicación:</strong> {{ $oferta->ubicacion }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-4"><strong>Publicado:</strong> {{ \Carbon\Carbon::parse($oferta->fechaPublicacion)->format('d/m/Y') }}</p>
                            <button @click="open = false"
                                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Cerrar
                            </button>
                        <form action="{{ route('postulaciones.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="fechaPostulacion" value="{{ now()->toDateString() }}">
                            <input type="hidden" name="oferta_id" value="{{ $oferta->idOferta }}">
                            <button type="submit"
                                class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Postularme
                            </button>
                        </form>                            
                        </div>                        
                    </div>
                </div>
            @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-300">No hay ofertas registradas.</p>
            @endif
        </div>
    </div>
    @endif
</x-app-layout>
