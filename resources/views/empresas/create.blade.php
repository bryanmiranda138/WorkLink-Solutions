<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Empresa') }}
        </h2>
    </x-slot>

<div class="container">

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                {{-- Datos de la empresa --}}
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información personal</h1>
                    <hr/>  
                    <br/>      
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">           
                        <div>
                            <label for="nomEmpresa" class="form-label">Empresa:</label>
                            <input type="text" name="nomEmpresa" class="form-control" required>
                        </div>
                    
                        <div>
                            <label for="sector" class="form-label">Sector:</label>
                            <input type="text" name="sector" class="form-control" required>
                        </div>

                        <div>
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div>
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" name="telefono" class="form-control" required>
                        </div> 
                    </div> 
                </div> 
                
                {{-- Ubicaciones --}}
                <div id="ubicacion__empresas-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la ubicación</h1>
                    <hr/>  
                    <br/>
                    <div class="ubicacion_empresa grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Departamento:</label>
                            <input type="text" name="ubicacion__empresas[0][nomDepartamento]" class="form-control" required>
                        </div>
                        <div>
                            <label>Municipio:</label>
                            <input type="text" name="ubicacion__empresas[0][nomMunicipio]" class="form-control" required>
                        </div>
                        <div>
                            <label>Dirección:</label>
                            <input type="text" name="ubicacion__empresas[0][direccion]" class="form-control" required>
                        </div>
                        <div>
                            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" 
                            id="add-ubicacion_empresa">Agregar Ubicación</button> 
                        </div>
                    </div>
                </div>          
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" 
                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded mb-3"
                >Guardar</button>
        </div>
    </form>
</div>

<script> 
    let ubicacion_empresaIndex = 1;

    document.getElementById('add-ubicacion_empresa').addEventListener('click', function () {
        const container = document.getElementById('ubicacion__empresas-container');

        const ubicacion_empresaHtml = `
            <div class="ubicacion_empresa">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div>
                        <label>Departamento:</label>
                        <input type="text" name="ubicacion__empresas[${ubicacion_empresaIndex}][nomDepartamento]" class="form-control" required>
                    </div>
                    <div>
                        <label>Municipio:</label>
                        <input type="text" name="ubicacion__empresas[${ubicacion_empresaIndex}][nomMunicipio]" class="form-control" required>
                    </div>
                    <div>
                        <label>Dirección:</label>
                        <input type="text" name="ubicacion__empresas[${ubicacion_empresaIndex}][direccion]" class="form-control" required>
                    </div>
                    <div>
                    <button type="button" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-ubicacion_empresa">Eliminar</button>
                    </div>
                </div>
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