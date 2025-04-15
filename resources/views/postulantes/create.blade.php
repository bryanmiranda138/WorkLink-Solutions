@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Postulante</h2>

    <form action="{{ route('postulantes.store') }}" method="POST">
        @csrf

        {{-- Datos del postulante --}}
        <div class="mb-3">
            <label for="primerNombre" class="form-label">Primer Nombre</label>
            <input type="text" name="primerNombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="segundoNombre" class="form-label">Segundo Nombre</label>
            <input type="text" name="segundoNombre" class="form-control">
        </div>

        <div class="mb-3">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" name="primerApellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" name="segundoApellido" class="form-control">
        </div>

        {{-- Idiomas --}}
        <hr>
        <h4>Idiomas</h4>
        <div id="idiomas-container">
            <div class="idioma mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Idioma</label>
                    <input type="text" name="idiomas[0][idioma]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Nivel</label>
                    <input type="text" name="idiomas[0][nivel]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-idioma">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-idioma">Agregar idioma</button>

        {{-- Habilidades --}}
        <hr>
        <h4>Habilidades</h4>
        <div id="habilidades-container">
            <div class="habilidad mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Habilidad</label>
                    <input type="text" name="habilidades[0][habilidad]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Nivel</label>
                    <input type="text" name="habilidades[0][nivel]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-habilidad">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-habilidad">Agregar habilidad</button>        

        {{-- Educaciones --}}
        <hr>
        <h4>Educaciones</h4>
        <div id="educaciones-container">
            <div class="educacion mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Título</label>
                    <input type="text" name="educaciones[0][titulo]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Institucion</label>
                    <input type="text" name="educaciones[0][institucion]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="educaciones[0][fechaInicio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Fin</label>
                    <input type="date" name="educaciones[0][fechaFin]" class="form-control" required>
                </div>                
                <button type="button" class="btn btn-danger btn-sm remove-educacion">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-educacion">Agregar educacion</button>        

        {{-- Experiencias --}}
        <hr>
        <h4>Experiencia</h4>
        <div id="experiencias-container">
            <div class="experiencia mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Puesto ocupado</label>
                    <input type="text" name="experiencias[0][puesto]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Empresa</label>
                    <input type="text" name="experiencias[0][empresa]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="experiencias[0][fechaInicio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Fin</label>
                    <input type="date" name="experiencias[0][fechaFin]" class="form-control" required>
                </div>   
                <div class="mb-2">
                    <label>Contacto de la empresa</label>
                    <input type="text" name="experiencias[0][contactoEmpresa]" class="form-control">
                </div>                             
                <button type="button" class="btn btn-danger btn-sm remove-experiencias">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-experiencia">Agregar experiencia</button>        

        {{-- Certificaciones --}}
        <hr>
        <h4>Certificaciones</h4>
        <div id="certificaciones-container">
            <div class="certificacion mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Nombre del certificado</label>
                    <input type="text" name="certificaciones[0][nomCert]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Institución</label>
                    <input type="text" name="certificaciones[0][institucion]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="certificaciones[0][fechaInicio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de Fin</label>
                    <input type="date" name="certificaciones[0][fechaFin]" class="form-control" required>
                </div>                              
                <button type="button" class="btn btn-danger btn-sm remove-certificaciones">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-certificacion">Agregar certificacion</button>     

        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

<script>
    let idiomaIndex = 1;
    let habilidadIndex = 1;
    let educacionIndex = 1;
    let experienciaIndex = 1;
    let certificacionIndex = 1;

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

