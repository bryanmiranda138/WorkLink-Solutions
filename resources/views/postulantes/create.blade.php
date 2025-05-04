<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="container">
    <h2>Crear Postulante</h2>

    <form action="{{ route('postulantes.store') }}" method="POST">
        @csrf

        {{-- Datos del postulante --}}
        <div class="mb-3">
            <label for="dui" class="form-label">DUI</label>
            <input type="text" name="dui" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" id="genero" class="form-select" required>
                <option value="">Seleccione una opción</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
        </div>
      
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

        <div class="mb-3">
            <label for="numTelefono" class="form-label">Número de teléfono</label>
            <input type="text" name="numTelefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="text" name="email" class="form-control" required>
        </div>

        {{-- Ubicaciones --}}
        <hr>
        <h4>Ubicaciones</h4>
        <div id="ubicacion__postulantes-container">
            <div class="ubicacion_postulante mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Departamento</label>
                    <input type="text" name="ubicacion__postulantes[0][nomDepartamento]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Municipio</label>
                    <input type="text" name="ubicacion__postulantes[0][nomMunicipio]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Dirección</label>
                    <input type="text" name="ubicacion__postulantes[0][direccion]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-ubicacion_postulante">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-ubicacion_postulante">Agregar Ubicación</button>

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

        {{-- Logros --}}
        <hr>
        <h4>Logros</h4>
        <div id="logros-container">
            <div class="logro mb-3 border p-3 rounded">
                <div class="mb-2">
                    <label>Descripción del logro</label>
                    <input type="text" name="logros[0][descLogro]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Fecha de obtención del logro</label>
                    <input type="date" name="logros[0][fechaLogro]" class="form-control" required>
                </div>                           
                <button type="button" class="btn btn-danger btn-sm remove-logros">Eliminar</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-logro">Agregar logro</button>         

        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
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
</x-app-layout>
