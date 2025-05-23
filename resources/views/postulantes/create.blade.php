<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar información de Postulante') }}
        </h2>
    </x-slot>

<div class="container">
    <form action="{{ route('postulantes.store') }}" method="POST">
        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                {{-- Datos del postulante --}}
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información personal</h1>
                    <hr/>  
                    <br/>                
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        
                        <div>
                            <label for="dui" class="form-label">DUI:</label>
                            <input type="text" name="dui" class="form-control" required>
                        </div>
                        <div>
                            <label for="genero" class="form-label">Género:</label>
                            <select name="genero" id="genero" class="form-select" required>
                                <option value="">Seleccione una opción</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div>
                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
                        </div>
                        <div>
                            <label for="primerNombre" class="form-label">Primer Nombre:</label>
                            <input type="text" name="primerNombre" class="form-control" required>
                        </div> 
                        <div>
                            <label for="segundoNombre" class="form-label">Segundo Nombre:</label>
                            <input type="text" name="segundoNombre" class="form-control">
                        </div>
                        <div>
                            <label for="primerApellido" class="form-label">Primer Apellido:</label>
                            <input type="text" name="primerApellido" class="form-control" required>
                        </div>
                        <div>
                            <label for="segundoApellido" class="form-label">Segundo Apellido:</label>
                            <input type="text" name="segundoApellido" class="form-control">
                        </div> 
                        <div>
                            <label for="numTelefono" class="form-label">Número de teléfono:</label>
                            <input type="text" name="numTelefono" class="form-control" required>
                        </div> 
                        <input type="hidden" name="user_id" class="form-control" 
                            value="{{ auth()->id() }}" required readonly>                      
                    </div>                                            
                </div>

                {{-- Ubicaciones --}}
                <div id="ubicacion__postulantes-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la ubicación</h1>
                    <hr/>  
                    <br/>                   
                    <div class="ubicacion_postulante grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Departamento:</label>
                            <input type="text" name="ubicacion__postulantes[0][nomDepartamento]" class="form-control" required>
                        </div>
                        <div>
                            <label>Municipio:</label>
                            <input type="text" name="ubicacion__postulantes[0][nomMunicipio]" class="form-control" required>
                        </div>
                        <div>
                            <label>Dirección</label>
                            <input type="text" name="ubicacion__postulantes[0][direccion]" class="form-control" required>
                        </div>
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-ubicacion_postulante">
                            Agregar Ubicación
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div>

                {{-- Idiomas --}}
                <div id="idiomas-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de los idiomas</h1>
                    <hr/>  
                    <br/>                   
                    <div class="idioma grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Idioma:</label>
                            <input type="text" name="idiomas[0][idioma]" class="form-control" required>
                        </div>
                        <div>
                            <label>Nivel:</label>
                            <input type="text" name="idiomas[0][nivel]" class="form-control" required>
                        </div>
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-idioma">
                            Agregar idioma
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div> 
                
                {{-- Habilidades --}}
                <div id="habilidades-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de las habilidades</h1>
                    <hr/>  
                    <br/>                   
                    <div class="habilidad grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Habilidad:</label>
                            <input type="text" name="habilidades[0][habilidad]" class="form-control" required>
                        </div>
                        <div>
                            <label>Nivel:</label>
                            <input type="text" name="habilidades[0][nivel]" class="form-control" required>
                        </div>
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-habilidad">
                            Agregar habilidad
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div>

                {{-- Educaciones --}}
                <div id="educaciones-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la educación</h1>
                    <hr/>  
                    <br/>                   
                    <div class="educacion grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Título:</label>
                            <input type="text" name="educaciones[0][titulo]" class="form-control" required>
                        </div>
                        <div>
                            <label>Institucion:</label>
                            <input type="text" name="educaciones[0][institucion]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de Inicio:</label>
                            <input type="date" name="educaciones[0][fechaInicio]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de Fin:</label>
                            <input type="date" name="educaciones[0][fechaFin]" class="form-control" required>
                        </div>                          
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-educacion">
                            Agregar educación
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div>

                {{-- Experiencias --}}
                <div id="experiencias-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la experiencia</h1>
                    <hr/>  
                    <br/>                   
                    <div class="experiencia grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Puesto ocupado:</label>
                            <input type="text" name="experiencias[0][puesto]" class="form-control" required>
                        </div>
                        <div>
                            <label>Empresa:</label>
                            <input type="text" name="experiencias[0][empresa]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de Inicio:</label>
                            <input type="date" name="experiencias[0][fechaInicio]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de Fin:</label>
                            <input type="date" name="experiencias[0][fechaFin]" class="form-control" required>
                        </div>  
                        <div>
                            <label>Contacto empresa:</label>
                            <input type="text" name="experiencias[0][contactoEmpresa]" class="form-control">
                        </div>                                                 
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-experiencia">
                            Agregar experiencia
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div>

                {{-- Certificaciones --}}
                <div id="certificaciones-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de las certificaciones</h1>
                    <hr/>  
                    <br/>                   
                    <div class="certificacion grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Certificado:</label>
                            <input type="text" name="certificaciones[0][nomCert]" class="form-control" required>
                        </div>
                        <div>
                            <label>Institución:</label>
                            <input type="text" name="certificaciones[0][institucion]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de Inicio:</label>
                            <input type="date" name="certificaciones[0][fechaInicio]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de Fin:</label>
                            <input type="date" name="certificaciones[0][fechaFin]" class="form-control" required>
                        </div>                                                  
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-certificacion">
                            Agregar certificación
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div>  

                {{-- Logros --}}
                <div id="logros-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="logro text-2xl font-bold">Información de los logros</h1>
                    <hr/>  
                    <br/>                   
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div>
                            <label>Descripción:</label>
                            <input type="text" name="logros[0][descLogro]" class="form-control" required>
                        </div>
                        <div>
                            <label>Fecha de obtención:</label>
                            <input type="date" name="logros[0][fechaLogro]" class="form-control" required>
                        </div>                                                 
                        <div>
                        <button type="button"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" id="add-logro">
                            Agregar logro
                        </button>
                        </div>                                                                      
                    </div>                                            
                </div>              
            </div>
        </div>                  
        <div class="flex justify-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded mb-3">Guardar</button>
        </div>
    </form>
</div>

<script>
    let ubicacion_postulanteIndex = 1;
    let idiomaIndex = 1;
    let habilidadIndex = 1;
    let educacionIndex = 1;
    let experienciaIndex = 1;
    let certificacionIndex = 1;
    let logroIndex = 1;

    document.getElementById('add-ubicacion_postulante').addEventListener('click', function () {
        const container = document.getElementById('ubicacion__postulantes-container');

        const ubicacion_postulanteHtml = `
        <div class="ubicacion_postulante"> 
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Departamento:</label>
                    <input type="text" name="ubicacion__postulantes[${ubicacion_postulanteIndex}][nomDepartamento]" class="form-control" required>
                </div>
                <div>
                    <label>Municipio:</label>
                    <input type="text" name="ubicacion__postulantes[${ubicacion_postulanteIndex}][nomMunicipio]" class="form-control" required>
                </div>
                <div>
                    <label>Dirección</label>
                    <input type="text" name="ubicacion__postulantes[${ubicacion_postulanteIndex}][direccion]" class="form-control" required>
                </div>
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-ubicacion_postulante">
                    Eliminar
                </button>
                </div>                                                                      
            </div>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', ubicacion_postulanteHtml);
        ubicacion_postulanteIndex++;
    });

    document.getElementById('add-idioma').addEventListener('click', function () {
        const container = document.getElementById('idiomas-container');

        const idiomaHtml = `
        <div class="idioma">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Idioma:</label>
                    <input type="text" name="idiomas[${idiomaIndex}][idioma]" class="form-control" required>
                </div>
                <div>
                    <label>Nivel:</label>
                    <input type="text" name="idiomas[${idiomaIndex}][nivel]" class="form-control" required>
                </div>
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-idioma">
                    Eliminar
                </button>
                </div>                                                                      
            </div> 
        </div> 
        `;

        container.insertAdjacentHTML('beforeend', idiomaHtml);
        idiomaIndex++;
    });

    document.getElementById('add-habilidad').addEventListener('click', function () {
        const container = document.getElementById('habilidades-container');

        const habilidadHtml = `
        <div class="habilidad">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Habilidad:</label>
                    <input type="text" name="habilidades[${habilidadIndex}][habilidad]" class="form-control" required>
                </div>
                <div>
                    <label>Nivel:</label>
                    <input type="text" name="habilidades[${habilidadIndex}][nivel]" class="form-control" required>
                </div>
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-habilidad">
                    Eliminar
                </button>
                </div>                                                                      
            </div> 
        `;

        container.insertAdjacentHTML('beforeend', habilidadHtml);
        habilidadIndex++;
    });    

    document.getElementById('add-educacion').addEventListener('click', function () {
        const container = document.getElementById('educaciones-container');

        const educacionHtml = `
        <div class="educacion">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Título:</label>
                    <input type="text" name="educaciones[${educacionIndex}][titulo]" class="form-control" required>
                </div>
                <div>
                    <label>Institucion:</label>
                    <input type="text" name="educaciones[${educacionIndex}][institucion]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de Inicio:</label>
                    <input type="date" name="educaciones[${educacionIndex}][fechaInicio]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de Fin:</label>
                    <input type="date" name="educaciones[${educacionIndex}][fechaFin]" class="form-control" required>
                </div>                          
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-educacion">
                    Eliminar
                </button>
                </div>                                                                      
            </div>
        </div> 
        `;

        container.insertAdjacentHTML('beforeend', educacionHtml);
        educacionIndex++;
    });

    document.getElementById('add-experiencia').addEventListener('click', function () {
        const container = document.getElementById('experiencias-container');

        const experienciaHtml = `
        <div class="experiencia">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Puesto ocupado:</label>
                    <input type="text" name="experiencias[${experienciaIndex}][puesto]" class="form-control" required>
                </div>
                <div>
                    <label>Empresa:</label>
                    <input type="text" name="experiencias[${experienciaIndex}][empresa]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de Inicio:</label>
                    <input type="date" name="experiencias[${experienciaIndex}][fechaInicio]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de Fin:</label>
                    <input type="date" name="experiencias[${experienciaIndex}][fechaFin]" class="form-control" required>
                </div>  
                <div>
                    <label>Contacto empresa:</label>
                    <input type="text" name="experiencias[${experienciaIndex}][contactoEmpresa]" class="form-control">
                </div>                                                 
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-experiencia">
                    Eliminar
                </button>
                </div>                                                                      
            </div>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', experienciaHtml);
        experienciaIndex++;
    }); 

    document.getElementById('add-certificacion').addEventListener('click', function () {
        const container = document.getElementById('certificaciones-container');

        const certificacionHtml = `
        <div class="certificacion">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Certificado:</label>
                    <input type="text" name="certificaciones[${certificacionIndex}][nomCert]" class="form-control" required>
                </div>
                <div>
                    <label>Institución:</label>
                    <input type="text" name="certificaciones[${certificacionIndex}][institucion]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de Inicio:</label>
                     <input type="date" name="certificaciones[${certificacionIndex}][fechaInicio]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de Fin:</label>
                    <input type="date" name="certificaciones[${certificacionIndex}][fechaFin]" class="form-control" required>
                </div>                                                  
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-certificacion">
                    Eliminar
                </button>
                </div>                                                                      
            </div>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', certificacionHtml);
        certificacionIndex++;
    }); 

    document.getElementById('add-logro').addEventListener('click', function () {
        const container = document.getElementById('logros-container');

        const logroHtml = `
        <div class="logro">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label>Descripción:</label>
                    <input type="text" name="logros[${logroIndex}][descLogro]" class="form-control" required>
                </div>
                <div>
                    <label>Fecha de obtención:</label>
                    <input type="date" name="logros[${logroIndex}][fechaLogro]" class="form-control" required>
                </div>                                                 
                <div>
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mb-3 remove-logro">
                    Eliminar
                </button>
                </div>                                                                      
            </div>                                            
        </div>        
        `;

        container.insertAdjacentHTML('beforeend', logroHtml);
        logroIndex++;
    });                

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-ubicacion_postulante')) {
            e.target.closest('.ubicacion_postulante').remove();
        }
    });
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-idioma')) {
            e.target.closest('.idioma').remove();
        }
    });
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-habilidad')) {
            e.target.closest('.habilidad').remove();
        }
    });
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-educacion')) {
            e.target.closest('.educacion').remove();
        }
    });  
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-experiencia')) {
            e.target.closest('.experiencia').remove();
        }
    }); 
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-certificacion')) {
            e.target.closest('.certificacion').remove();
        }
    });
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-logro')) {
            e.target.closest('.logro').remove();
        }
    });     
</script>
</x-app-layout>
