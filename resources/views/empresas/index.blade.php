<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Empresas') }}
        </h2>
    </x-slot>
    <h1>Lista de Empresas</h1>
    <a href="{{ route('empresas.create') }}">Agregar Empresa</a>
    <ul>
        @foreach ($empresas as $empresa)
            <li>
                {{ $empresa->nomEmpresa }} - {{ $empresa->sector }}
                <a href="{{ route('empresas.edit', $empresa) }}">Editar</a>
                <form action="{{ route('empresas.destroy', $empresa) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
