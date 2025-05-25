<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar información personal') }}
        </h2>
    </x-slot>

<div class="container">
    <form action="{{ route('postulantes.update', $postulante->idPostulante) }}" method="POST">
        @csrf
        @method('PUT')

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
                            <input type="text" name="dui" class="form-control" value="{{ $postulante->dui }}" required>
                        </div>

                        <div>
                            <label for="genero" class="form-label">Género:</label>
                            <select name="genero" id="genero" class="form-select" required>
                                <option value="">Seleccione una opción</option>
                                <option value="Masculino" {{ $postulante->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ $postulante->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>

                        <div>
                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{ $postulante->fechaNacimiento }}" required>
                        </div>

                        <div>
                            <label for="primerNombre" class="form-label">Primer Nombre:</label>
                            <input type="text" name="primerNombre" class="form-control" value="{{ $postulante->primerNombre }}" required>
                        </div>

                        <div>
                            <label for="segundoNombre" class="form-label">Segundo Nombre:</label>
                            <input type="text" name="segundoNombre" class="form-control" value="{{ $postulante->segundoNombre }}">
                        </div>

                        <div>
                            <label for="primerApellido" class="form-label">Primer Apellido:</label>
                            <input type="text" name="primerApellido" class="form-control" value="{{ $postulante->primerApellido }}" required>
                        </div>

                        <div>
                            <label for="segundoApellido" class="form-label">Segundo Apellido:</label>
                            <input type="text" name="segundoApellido" class="form-control" value="{{ $postulante->segundoApellido }}">
                        </div>

                        <div>
                            <label for="numTelefono" class="form-label">Número de teléfono:</label>
                            <input type="text" name="numTelefono" class="form-control" value="{{ $postulante->numTelefono }}" required>
                        </div>

                        <input type="hidden" name="user_id" class="form-control" 
                            value="{{ auth()->id() }}" required readonly>                         
                    </div>
                </div>

                {{-- Ubicación --}}
                <div id="ubicacion__postulantes-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la ubicación</h1>
                    <hr/>  
                    <br/>                 
                    @foreach ($postulante->ubicacion__postulantes as $index => $ubicacion_postulante)
                        <div class="ubicacion_postulante grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="ubicacion__postulantes[{{ $index }}][id]" value="{{ $ubicacion_postulante->idUbicacionPostulante }}">
                            <div>
                                <label>Departamento:</label>
                                <input type="text" name="ubicacion__postulantes[{{ $index }}][nomDepartamento]" class="form-control" value="{{ $ubicacion_postulante->nomDepartamento }}" required>
                            </div>
                            <div>
                                <label>Municipio:</label>
                                <input type="text" name="ubicacion__postulantes[{{ $index }}][nomMunicipio]" class="form-control" value="{{ $ubicacion_postulante->nomMunicipio }}" required>
                            </div>
                            <div>
                                <label>Dirección:</label>
                                <input type="text" name="ubicacion__postulantes[{{ $index }}][direccion]" class="form-control" value="{{ $ubicacion_postulante->direccion }}" required>
                            </div> 
                            <div>                   
                            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3"
                                id="add-ubicacion_postulante">Agregar ubicación</button>
                            </div> 
                        </div>
                    @endforeach                  
                </div>               

                {{-- Idiomas --}}
                <div id="idiomas-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de los idiomas</h1>
                    <hr/>  
                    <br/>  
                    @foreach ($postulante->idiomas as $index => $idioma)
                        <div class="idioma grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="idiomas[{{ $index }}][id]" value="{{ $idioma->idIdioma }}">
                            <div>
                                <label>Idioma:</label>
                                <input type="text" name="idiomas[{{ $index }}][idioma]" class="form-control" value="{{ $idioma->idioma }}" required>
                            </div>
                            <div>
                                <label>Nivel:</label>
                                <input type="text" name="idiomas[{{ $index }}][nivel]" class="form-control" value="{{ $idioma->nivel }}" required>
                            </div>
                            <div>
                                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" 
                                id="add-idioma">Agregar idioma</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Habilidades --}}
                <div id="habilidades-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de las habilidades</h1>
                    <hr/>  
                    <br/> 
                    @foreach ($postulante->habilidades as $index => $habilidad)
                        <div class="habilidad grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="habilidades[{{ $index }}][id]" value="{{ $habilidad->idHabilidad }}">
                            <div>
                                <label>Habilidad:</label>
                                <input type="text" name="habilidades[{{ $index }}][habilidad]" class="form-control" value="{{ $habilidad->habilidad }}" required>
                            </div>
                            <div>
                                <label>Nivel:</label>
                                <input type="text" name="habilidades[{{ $index }}][nivel]" class="form-control" value="{{ $habilidad->nivel }}" required>
                            </div>
                            <div>
                                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3"
                                    id="add-habilidad">Agregar habilidad</button>
                            </div>
                        </div>
                    @endforeach
                </div>
               
                {{-- Educaciones --}}
                <div id="educaciones-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la educación</h1>
                    <hr/>  
                    <br/> 
                    @foreach ($postulante->educaciones as $index => $educacion)
                        <div class="educacion grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="educaciones[{{ $index }}][id]" value="{{ $educacion->idEducacion }}">
                            <div>
                                <label>Titulo:</label>
                                <input type="text" name="educaciones[{{ $index }}][titulo]" class="form-control" value="{{ $educacion->titulo }}" required>
                            </div>
                            <div>
                                <label>Institucion:</label>
                                <input type="text" name="educaciones[{{ $index }}][institucion]" class="form-control" value="{{ $educacion->institucion }}" required>
                            </div>
                            <div>
                                <label>Fecha de Inicio:</label>
                                <input type="date" name="educaciones[{{ $index }}][fechaInicio]" class="form-control" value="{{ $educacion->fechaInicio }}" required>
                            </div>
                            <div>
                                <label>Fecha de Fin:</label>
                                <input type="date" name="educaciones[{{ $index }}][fechaFin]" class="form-control" value="{{ $educacion->fechaFin }}" required>
                            </div> 
                            <div>                   
                            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3"
                                id="add-educacion">Agregar educacion</button>
                            </div> 
                        </div>
                    @endforeach
                </div>
                        
                {{-- Experiencias --}}
                <div id="experiencias-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de la experiencia</h1>
                    <hr/>  
                    <br/> 
                    @foreach ($postulante->experiencias as $index => $experiencia)
                        <div class="experiencia grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="experiencias[{{ $index }}][id]" value="{{ $experiencia->idExperiencia }}">
                            <div>
                                <label>Puesto ocupado:</label>
                                <input type="text" name="experiencias[{{ $index }}][puesto]" class="form-control" value="{{ $experiencia->puesto }}" required>
                            </div>
                            <div>
                                <label>Empresa:</label>
                                <input type="text" name="experiencias[{{ $index }}][empresa]" class="form-control" value="{{ $experiencia->empresa }}" required>
                            </div>
                            <div>
                                <label>Fecha de Inicio:</label>
                                <input type="date" name="experiencias[{{ $index }}][fechaInicio]" class="form-control" value="{{ $experiencia->fechaInicio }}" required>
                            </div>
                            <div>
                                <label>Fecha de Fin:</label>
                                <input type="date" name="experiencias[{{ $index }}][fechaFin]" class="form-control" value="{{ $experiencia->fechaFin }}" required>
                            </div>  
                            <div>
                            <label>Contacto empresa:</label>
                                <input type="text" name="experiencias[{{ $index }}][contactoEmpresa]" class="form-control" value="{{ $experiencia->contactoEmpresa }}">
                            </div> 
                            <div>                                      
                                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" 
                                    id="add-experiencia">Agregar experiencia</button>
                            </div> 
                        </div>
                    @endforeach
                </div>
               
                {{-- Certificaciones --}}
                <div id="certificaciones-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Información de las certificaciones</h1>
                    <hr/>  
                    <br/> 
                    @foreach ($postulante->certificaciones as $index => $certificacion)
                        <div class="certificacion grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="certificaciones[{{ $index }}][id]" value="{{ $certificacion->idCertificacion }}">
                            <div>
                                <label>Certificado:</label>
                                <input type="text" name="certificaciones[{{ $index }}][nomCert]" class="form-control" value="{{ $certificacion->nomCert }}" required>
                            </div>
                            <div>
                                <label>Institución:</label>
                                <input type="text" name="certificaciones[{{ $index }}][institucion]" class="form-control" value="{{ $certificacion->institucion }}" required>
                            </div>
                            <div>
                                <label>Fecha de Inicio:</label>
                                <input type="date" name="certificaciones[{{ $index }}][fechaInicio]" class="form-control" value="{{ $certificacion->fechaInicio }}" required>
                            </div>
                            <div>
                                <label>Fecha de Fin:</label>
                                <input type="date" name="certificaciones[{{ $index }}][fechaFin]" class="form-control" value="{{ $certificacion->fechaFin }}" required>
                            </div>   
                            <div>                                      
                                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3"
                                    id="add-certificacion">Agregar certificacion</button>
                            </div>
                        </div>
                    @endforeach
                </div>        
               
                {{-- Logros --}}
                <div id="logros-container" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="logro text-2xl font-bold">Información de los logros</h1>
                    <hr/>  
                    <br/>
                    @foreach ($postulante->logros as $index => $logro)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <input type="hidden" name="logros[{{ $index }}][id]" value="{{ $logro->idLogro }}">
                            <div>
                                <label>Logro:</label>
                                <input type="text" name="logros[{{ $index }}][descLogro]" class="form-control" value="{{ $logro->descLogro }}" required>
                            </div>
                            <div>
                                <label>Fecha de obtención:</label>
                                <input type="date" name="logros[{{ $index }}][fechaLogro]" class="form-control" value="{{ $logro->fechaLogro }}" required>
                            </div>   
                            <div>                                      
                                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded mb-3" 
                                    id="add-logro">Agregar logro</button>
                            </div>  
                        </div>
                    @endforeach
                </div>                   
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded mb-3"
                >Actualizar</button>
        </div>
    </form>
</div>

<script>
    let ubicacion_postulanteIndex = {{ $postulante->ubicacion__postulantes->count() }};
    let idiomaIndex = {{ $postulante->idiomas->count() }};
    let habilidadIndex = {{ $postulante->habilidades->count() }};
    let educacionIndex = {{ $postulante->educaciones->count() }};
    let experienciaIndex = {{ $postulante->experiencias->count() }};
    let certificacionIndex = {{ $postulante->certificaciones->count() }};
    let logroIndex = {{ $postulante->logros->count() }};

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