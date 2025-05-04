<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Empresa') }}
        </h2>
    </x-slot>
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

        {{-- Ubicación --}}
        <hr>
        <h4>Ubicación</h4>
        <div id="ubicacion__empresas-container">
            @foreach ($empresa->ubicacion__empresas as $index => $ubicacion_empresa)
                <div class="ubicacion_empresa mb-3 border p-3 rounded">
                    <input type="hidden" name="ubicacion__empresas[{{ $index }}][id]" value="{{ $ubicacion_empresa->idUbicacionEmpresa }}">
                    <div class="mb-2">
                        <label>Departamento</label>
                        <input type="text" name="ubicacion__empresas[{{ $index }}][nomDepartamento]" class="form-control" value="{{ $ubicacion_empresa->nomDepartamento }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Municipio</label>
                        <input type="text" name="ubicacion__empresas[{{ $index }}][nomMunicipio]" class="form-control" value="{{ $ubicacion_empresa->nomMunicipio }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Dirección</label>
                        <input type="text" name="ubicacion__empresas[{{ $index }}][direccion]" class="form-control" value="{{ $ubicacion_empresa->direccion }}" required>
                    </div>                    
                    <button type="button" class="btn btn-danger btn-sm remove-ubicacion_empresa">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-ubicacion_empresa">Agregar ubicación</button>

        <div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>

<script>
    let ubicacion_empresaIndex = {{ $empresa->ubicacion__empresas->count() }};

    document.getElementById('add-ubicacion_empresa').addEventListener('click', function () {
        const container = document.getElementById('ubicacion__empresas-container');

        const ubicacion_empresaHtml = `
            <div class="ubicacion_empresa mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Departamento</label>
                    <input type="text" name="ubicacion__empresas[${ubicacion_empresaIndex}][nomDepartamento]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Municipio</label>
                    <input type="text" name="ubicacion__empresas[${ubicacion_empresaIndex}][nomMunicipio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Dirección</label>
                    <input type="text" name="ubicacion__empresas[${ubicacion_empresaIndex}][direccion]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-ubicacion_empresa">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', ubicacion_empresaHtml);
        ubicacion_empresaIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-ubicacion_empresa')) {
            e.target.closest('.ubicacion_empresa').remove();
        }
    });
</script>
</x-app-layout>