@extends('layouts.app')

@section('titulo', 'Editar estudiante')

@section('contenido')
    <h1>Editar estudiante</h1>

    <form method="POST" action="{{ route('estudiantes.update', $estudiante->id) }}">
        @csrf
        @method('PUT')

        <label for="numero_cuenta">Número de cuenta</label>
        <input id="numero_cuenta" name="numero_cuenta" type="text" maxlength="20" value="{{ old('numero_cuenta', $estudiante->numero_cuenta) }}" required>
        @error('numero_cuenta')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" maxlength="100" value="{{ old('nombre', $estudiante->nombre) }}" required>
        @error('nombre')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="email" maxlength="100" value="{{ old('correo', $estudiante->correo) }}" required>
        @error('correo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento->format('Y-m-d')) }}" required>
        @error('fecha_nacimiento')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Actualizar</button>
            <a href="{{ route('estudiantes.index') }}">Cancelar</a>
        </p>
    </form>
@endsection