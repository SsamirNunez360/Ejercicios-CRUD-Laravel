@extends('layouts.app')

@section('titulo', 'Crear estudiante')

@section('contenido')
    <h1>Crear estudiante</h1>

    <form method="POST" action="{{ route('estudiantes.store') }}">
        @csrf

        <label for="numero_cuenta">Número de cuenta</label>
        <input id="numero_cuenta" name="numero_cuenta" type="text" maxlength="20" value="{{ old('numero_cuenta') }}" required>
        @error('numero_cuenta')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" maxlength="100" value="{{ old('nombre') }}" required>
        @error('nombre')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="email" maxlength="100" value="{{ old('correo') }}" required>
        @error('correo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" required>
        @error('fecha_nacimiento')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ route('estudiantes.index') }}">Cancelar</a>
        </p>
    </form>
@endsection