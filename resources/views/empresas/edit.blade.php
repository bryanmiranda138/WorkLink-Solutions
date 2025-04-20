@extends('layouts.empresa')

@section('content')
<div class="container">
    <h2>Editar Empresa</h2>

    <form action="{{ route('empresas.update', $empresa->idEmpresa) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Datos de la empresa --}}
        <div class="mb-3">
            <label for="nomEmpresa" class="form-label">Nombre de la empresa</label>
            <input type="text" name="nomEmpresa" class="form-control" value="{{ $empresa->nomEmpresa }}" required>
        </div>

        <div class="mb-3">
            <label for="sector" class="form-label">Sector</label>
            <input type="text" name="sector" class="form-control" value="{{ $empresa->sector }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="text" name="email" class="form-control" value="{{ $empresa->email }}">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $empresa->telefono }}" required>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>