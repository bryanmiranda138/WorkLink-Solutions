<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles de la Oferta') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-4">

            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                {{ $oferta->tituloOferta }}
            </h1>

            <div class="text-gray-700 dark:text-gray-300">
                <p><strong>Descripción:</strong> {{ $oferta->descOferta }}</p>
                <p><strong>Requisitos:</strong> {{ $oferta->requisitos }}</p>
                <p><strong>Salario:</strong> ${{ number_format($oferta->salario, 2) }}</p>
                <p><strong>Modalidad:</strong> {{ $oferta->modalidad }}</p>
                <p><strong>Ubicación:</strong> {{ $oferta->ubicacion }}</p>
                <p><strong>Fecha de Publicación:</strong> {{ $oferta->fechaPublicacion }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
