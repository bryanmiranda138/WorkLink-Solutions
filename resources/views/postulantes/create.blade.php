@extends('layouts.app')

@section('content')
    <h1>Crear Postulante</h1>
    <form action="{{ route('postulantes.store') }}" method="POST">
        @csrf
        <input type="text" name="primerNombre" placeholder="Primer nombre" required>
        <input type="text" name="segundoNombre" placeholder="Segundo nombre">
        <input type="text" name="primerApellido" placeholder="Primer apellido" required>
        <input type="text" name="segundoApellido" placeholder="Segundo apellido">
        <button type="submit">Guardar</button>
    </form>
@endsection
