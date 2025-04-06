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

        <div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>

<script>
    let idiomaIndex = {{ $postulante->idiomas->count() }};

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

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-idioma')) {
            e.target.closest('.idioma').remove();
        }
    });
</script>
@endsection

