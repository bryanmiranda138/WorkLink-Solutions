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

        <div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>

<script>
    let idiomaIndex = {{ $postulante->idiomas->count() }};
    let habilidadIndex = {{ $postulante->habilidades->count() }};
    let educacionIndex = {{ $postulante->educaciones->count() }};

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
</script>
@endsection

