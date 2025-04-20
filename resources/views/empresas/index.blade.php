@extends('layouts.empresa')

@section('content')
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
@endsection
