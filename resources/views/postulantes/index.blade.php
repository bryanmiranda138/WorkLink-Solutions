<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Postulantes') }}
        </h2>
    </x-slot>

    <h1>Lista de Postulantes</h1>
    <a href="{{ route('postulantes.create') }}">Agregar Postulante</a>
    <ul>
        @foreach ($postulantes as $postulante)
            <li>
                {{ $postulante->primerNombre }} - {{ $postulante->primerApellido }}
                <a href="{{ route('postulantes.edit', $postulante) }}">Editar</a>
                <form action="{{ route('postulantes.destroy', $postulante) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>