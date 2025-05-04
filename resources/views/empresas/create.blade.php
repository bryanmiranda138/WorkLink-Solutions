<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Empresa') }}
        </h2>
    </x-slot>
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
        
        {{-- Ubicaciones --}}
        <hr>
        <h4>Ubicaciones</h4>
        <div id="ubicacion__empresas-container">
            <div class="ubicacion_empresa mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Departamento</label>
                    <input type="text" name="ubicacion__empresas[0][nomDepartamento]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Municipio</label>
                    <input type="text" name="ubicacion__empresas[0][nomMunicipio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Dirección</label>
                    <input type="text" name="ubicacion__empresas[0][direccion]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-ubicacion_empresa">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-ubicacion_empresa">Agregar Ubicación</button>        

        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

<script> 
    let ubicacion_empresaIndex = 1;

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