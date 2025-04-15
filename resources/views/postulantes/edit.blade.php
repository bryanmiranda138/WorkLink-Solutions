@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Postulante</h2>

    <form action="{{ route('postulantes.update', $postulante->idPostulante) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Datos del postulante --}}
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

        <div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>

<script>
    let idiomaIndex = {{ $postulante->idiomas->count() }};
    let habilidadIndex = {{ $postulante->habilidades->count() }};
    let educacionIndex = {{ $postulante->educaciones->count() }};
    let experienciaIndex = {{ $postulante->experiencias->count() }};
    let certificacionIndex = {{ $postulante->certificaciones->count() }};

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
</script>
@endsection

