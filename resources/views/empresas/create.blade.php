@extends('layouts.empresa')

@section('content')
<div class="container">
    <h2>Crear Empresa</h2>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf

        {{-- Datos de la empresa --}}
        <div class="mb-3">
            <label for="nomEmpresa" class="form-label">Nombre de la empresa</label>
            <input type="text" name="nomEmpresa" class="form-control" required>
        </div>
      
        <div class="mb-3">
            <label for="sector" class="form-label">Sector</label>
            <input type="text" name="sector" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>      

        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

<script> 
</script>
@endsection

