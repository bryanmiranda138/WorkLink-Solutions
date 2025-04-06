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

        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

<script>
    let idiomaIndex = 1;

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

