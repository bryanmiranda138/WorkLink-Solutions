@extends('layouts.app')

@section('content')
    <h1>Editar Postulante</h1>
    <form action="{{ route('postulantes.update', $postulante) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="primerNombre" value="{{ $postulante->primerNombre }}" required>
        <input type="text" name="segundoNombre" value="{{ $postulante->segundoNombre }}">
        <input type="text" name="primerApellido" value="{{ $postulante->primerApellido }}" required>
        <input type="text" name="segundoApellido" value="{{ $postulante->segundoApellido }}">
        <button type="submit">Actualizar</button>
    </form>
@endsection
