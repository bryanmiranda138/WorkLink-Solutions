<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <h2>Editar Postulante</h2>

    <form action="{{ route('postulantes.update', $postulante->idPostulante) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Datos del postulante --}}
        <div class="mb-3">
            <label for="dui" class="form-label">DUI</label>
            <input type="text" name="dui" class="form-control" value="{{ $postulante->dui }}" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" id="genero" class="form-select" value="{{ $postulante->genero }}" required>
                <option value="">Seleccione una opción</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{ $postulante->fechaNacimiento }}" required>
        </div>

        <div class="mb-3">
            <label for="primerNombre" class="form-label">Primer Nombre</label>
            <input type="text" name="primerNombre" class="form-control" value="{{ $postulante->primerNombre }}" required>
        </div>

        <div class="mb-3">
            <label for="segundoNombre" class="form-label">Segundo Nombre</label>
            <input type="text" name="segundoNombre" class="form-control" value="{{ $postulante->segundoNombre }}">
        </div>

        <div class="mb-3">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" name="primerApellido" class="form-control" value="{{ $postulante->primerApellido }}" required>
        </div>

        <div class="mb-3">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" name="segundoApellido" class="form-control" value="{{ $postulante->segundoApellido }}">
        </div>

        <div class="mb-3">
            <label for="numTelefono" class="form-label">Número de teléfono</label>
            <input type="text" name="numTelefono" class="form-control" value="{{ $postulante->numTelefono }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="text" name="email" class="form-control" value="{{ $postulante->email }}" required>
        </div>

        {{-- Ubicación --}}
        <hr>
        <h4>Ubicación</h4>
        <div id="ubicacion__postulantes-container">
            @foreach ($postulante->ubicacion__postulantes as $index => $ubicacion_postulante)
                <div class="ubicacion_postulante mb-3 border p-3 rounded">
                    <input type="hidden" name="ubicacion__postulantes[{{ $index }}][id]" value="{{ $ubicacion_postulante->idUbicacionPostulante }}">
                    <div class="mb-2">
                        <label>Departamento</label>
                        <input type="text" name="ubicacion__postulantes[{{ $index }}][nomDepartamento]" class="form-control" value="{{ $ubicacion_postulante->nomDepartamento }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Municipio</label>
                        <input type="text" name="ubicacion__postulantes[{{ $index }}][nomMunicipio]" class="form-control" value="{{ $ubicacion_postulante->nomMunicipio }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Dirección</label>
                        <input type="text" name="ubicacion__postulantes[{{ $index }}][direccion]" class="form-control" value="{{ $ubicacion_postulante->direccion }}" required>
                    </div>                    
                    <button type="button" class="btn btn-danger btn-sm remove-ubicacion_postulante">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-ubicacion_postulante">Agregar ubicación</button>

        {{-- Idiomas --}}
        <hr>
        <h4>Idiomas</h4>
        <div id="idiomas-container">
            @foreach ($postulante->idiomas as $index => $idioma)
                <div class="idioma mb-3 border p-3 rounded">
                    <input type="hidden" name="idiomas[{{ $index }}][id]" value="{{ $idioma->idIdioma }}">
                    <div class="mb-2">
                        <label>Idioma</label>
                        <input type="text" name="idiomas[{{ $index }}][idioma]" class="form-control" value="{{ $idioma->idioma }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Nivel</label>
                        <input type="text" name="idiomas[{{ $index }}][nivel]" class="form-control" value="{{ $idioma->nivel }}" required>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-idioma">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-idioma">Agregar idioma</button>

        {{-- Habilidades --}}
        <hr>
        <h4>Habilidades</h4>
        <div id="habilidades-container">
            @foreach ($postulante->habilidades as $index => $habilidad)
                <div class="idioma mb-3 border p-3 rounded">
                    <input type="hidden" name="habilidades[{{ $index }}][id]" value="{{ $habilidad->idHabilidad }}">
                    <div class="mb-2">
                        <label>Habilidad</label>
                        <input type="text" name="habilidades[{{ $index }}][habilidad]" class="form-control" value="{{ $habilidad->habilidad }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Nivel</label>
                        <input type="text" name="habilidades[{{ $index }}][nivel]" class="form-control" value="{{ $habilidad->nivel }}" required>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-habilidad">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-habilidad">Agregar habilidad</button>        

        {{-- Educaciones --}}
        <hr>
        <h4>Educaciones</h4>
        <div id="educaciones-container">
            @foreach ($postulante->educaciones as $index => $educacion)
                <div class="educacion mb-3 border p-3 rounded">
                    <input type="hidden" name="educaciones[{{ $index }}][id]" value="{{ $educacion->idEducacion }}">
                    <div class="mb-2">
                        <label>Titulo</label>
                        <input type="text" name="educaciones[{{ $index }}][titulo]" class="form-control" value="{{ $educacion->titulo }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Institucion</label>
                        <input type="text" name="educaciones[{{ $index }}][institucion]" class="form-control" value="{{ $educacion->institucion }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de Inicio</label>
                        <input type="date" name="educaciones[{{ $index }}][fechaInicio]" class="form-control" value="{{ $educacion->fechaInicio }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de Fin</label>
                        <input type="date" name="educaciones[{{ $index }}][fechaFin]" class="form-control" value="{{ $educacion->fechaFin }}" required>
                    </div>                    
                    <button type="button" class="btn btn-danger btn-sm remove-educacion">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-educacion">Agregar educacion</button>        

        {{-- Experiencias --}}
        <hr>
        <h4>Experiencia</h4>
        <div id="experiencias-container">
            @foreach ($postulante->experiencias as $index => $experiencia)
                <div class="experiencia mb-3 border p-3 rounded">
                    <input type="hidden" name="experiencias[{{ $index }}][id]" value="{{ $experiencia->idExperiencia }}">
                    <div class="mb-2">
                        <label>Puesto ocupado</label>
                        <input type="text" name="experiencias[{{ $index }}][puesto]" class="form-control" value="{{ $experiencia->puesto }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Empresa</label>
                        <input type="text" name="experiencias[{{ $index }}][empresa]" class="form-control" value="{{ $experiencia->empresa }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de Inicio</label>
                        <input type="date" name="experiencias[{{ $index }}][fechaInicio]" class="form-control" value="{{ $experiencia->fechaInicio }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de Fin</label>
                        <input type="date" name="experiencias[{{ $index }}][fechaFin]" class="form-control" value="{{ $experiencia->fechaFin }}" required>
                    </div>  
                    <div class="mb-2">
                    <label>Contacto de la empresa</label>
                        <input type="text" name="experiencias[{{ $index }}][contactoEmpresa]" class="form-control" value="{{ $experiencia->contactoEmpresa }}">
                    </div>                                       
                    <button type="button" class="btn btn-danger btn-sm remove-experiencia">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-experiencia">Agregar experiencia</button>

        {{-- Certificaciones --}}
        <hr>
        <h4>Certificaciones</h4>
        <div id="certificaciones-container">
            @foreach ($postulante->certificaciones as $index => $certificacion)
                <div class="certificacion mb-3 border p-3 rounded">
                    <input type="hidden" name="certificaciones[{{ $index }}][id]" value="{{ $certificacion->idCertificacion }}">
                    <div class="mb-2">
                        <label>Nombre del certificado</label>
                        <input type="text" name="certificaciones[{{ $index }}][nomCert]" class="form-control" value="{{ $certificacion->nomCert }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Institución</label>
                        <input type="text" name="certificaciones[{{ $index }}][institucion]" class="form-control" value="{{ $certificacion->institucion }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de Inicio</label>
                        <input type="date" name="certificaciones[{{ $index }}][fechaInicio]" class="form-control" value="{{ $certificacion->fechaInicio }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de Fin</label>
                        <input type="date" name="certificaciones[{{ $index }}][fechaFin]" class="form-control" value="{{ $certificacion->fechaFin }}" required>
                    </div>                                         
                    <button type="button" class="btn btn-danger btn-sm remove-certificacion">Eliminar</button>
                </div>
            @endforeach
        </div>        

        <button type="button" class="btn btn-secondary mb-3" id="add-certificacion">Agregar certificacion</button>

        {{-- Logros --}}
        <hr>
        <h4>Logros</h4>
        <div id="logros-container">
            @foreach ($postulante->logros as $index => $logro)
                <div class="logro mb-3 border p-3 rounded">
                    <input type="hidden" name="logros[{{ $index }}][id]" value="{{ $logro->idLogro }}">
                    <div class="mb-2">
                        <label>Descripción del logro</label>
                        <input type="text" name="logros[{{ $index }}][descLogro]" class="form-control" value="{{ $logro->descLogro }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Fecha de obtención del logro</label>
                        <input type="date" name="logros[{{ $index }}][fechaLogro]" class="form-control" value="{{ $logro->fechaLogro }}" required>
                    </div>                                         
                    <button type="button" class="btn btn-danger btn-sm remove-logro">Eliminar</button>
                </div>
            @endforeach
        </div>        

        <button type="button" class="btn btn-secondary mb-3" id="add-logro">Agregar logro</button>

        <div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
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
            <div class="ubicacion_postulante mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Departamento</label>
                    <input type="text" name="ubicacion__postulantes[${ubicacion_postulanteIndex}][nomDepartamento]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Municipio</label>
                    <input type="text" name="ubicacion__postulantes[${ubicacion_postulanteIndex}][nomMunicipio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Dirección</label>
                    <input type="text" name="ubicacion__postulantes[${ubicacion_postulanteIndex}][direccion]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-ubicacion_postulante">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', ubicacion_postulanteHtml);
        ubicacion_postulanteIndex++;
    });


    document.getElementById('add-idioma').addEventListener('click', function () {
        const container = document.getElementById('idiomas-container');

        const idiomaHtml = `
            <div class="idioma mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Idioma</label>
                    <input type="text" name="idiomas[${idiomaIndex}][idioma]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Nivel</label>
                    <input type="text" name="idiomas[${idiomaIndex}][nivel]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-idioma">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', idiomaHtml);
        idiomaIndex++;
    });

    document.getElementById('add-habilidad').addEventListener('click', function () {
        const container = document.getElementById('habilidades-container');

        const habilidadHtml = `
            <div class="habilidad mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Habilidad</label>
                    <input type="text" name="habilidades[${habilidadIndex}][habilidad]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Nivel</label>
                    <input type="text" name="habilidades[${habilidadIndex}][nivel]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-habilidad">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', habilidadHtml);
        habilidadIndex++;
    });

    document.getElementById('add-educacion').addEventListener('click', function () {
        const container = document.getElementById('educaciones-container');

        const educacionHtml = `
            <div class="educacion mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Titulo</label>
                    <input type="text" name="educaciones[${educacionIndex}][titulo]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Institucion</label>
                    <input type="text" name="educaciones[${educacionIndex}][institucion]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="educaciones[${educacionIndex}][fechaInicio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Fin</label>
                    <input type="date" name="educaciones[${educacionIndex}][fechaFin]" class="form-control" required>
                </div>                  
                <button type="button" class="btn btn-danger btn-sm remove-educacion">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', educacionHtml);
        educacionIndex++;
    });
    
    document.getElementById('add-experiencia').addEventListener('click', function () {
        const container = document.getElementById('experiencias-container');

        const experienciaHtml = `
            <div class="experiencia mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Puesto ocupado</label>
                    <input type="text" name="experiencias[${experienciaIndex}][puesto]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Empresa</label>
                    <input type="text" name="experiencias[${experienciaIndex}][empresa]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="experiencias[${experienciaIndex}][fechaInicio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Fin</label>
                    <input type="date" name="experiencias[${experienciaIndex}][fechaFin]" class="form-control" required>
                </div>   
                <div class="mb-2">
                    <label>Contacto de la empresa</label>
                    <input type="text" name="experiencias[${experienciaIndex}][contactoEmpresa]" class="form-control">
                </div>                             
                <button type="button" class="btn btn-danger btn-sm remove-experiencias">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', experienciaHtml);
        experienciaIndex++;
    });    

    document.getElementById('add-certificacion').addEventListener('click', function () {
        const container = document.getElementById('certificaciones-container');

        const certificacionHtml = `
            <div class="certificacion mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Nombre del certificado</label>
                    <input type="text" name="certificaciones[${certificacionIndex}][nomCert]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Institución</label>
                    <input type="text" name="certificaciones[${certificacionIndex}][institucion]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="certificaciones[${certificacionIndex}][fechaInicio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Fin</label>
                    <input type="date" name="certificaciones[${certificacionIndex}][fechaFin]" class="form-control" required>
                </div>                              
                <button type="button" class="btn btn-danger btn-sm remove-certificaciones">Eliminar</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', certificacionHtml);
        certificacionIndex++;
    });

    document.getElementById('add-logro').addEventListener('click', function () {
        const container = document.getElementById('logros-container');

        const logroHtml = `
            <div class="logro mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Descripción del logro</label>
                    <input type="text" name="logros[${logroIndex}][descLogro]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de obtención del logro</label>
                    <input type="date" name="logros[${logroIndex}][fechaLogro]" class="form-control" required>
                </div>                           
                <button type="button" class="btn btn-danger btn-sm remove-logros">Eliminar</button>
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