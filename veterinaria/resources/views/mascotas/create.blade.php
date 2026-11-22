@extends('layouts.app')

@section('titulo', 'Crear mascota')

@section('contenido')
    <h1>Crear mascota</h1>

    <form method="POST" action="{{ route('mascotas.store') }}">
        @csrf

        <label for="codigo">Código</label>
        <input id="codigo" name="codigo" type="text" maxlength="20" value="{{ old('codigo') }}" required>
        @error('codigo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" maxlength="80" value="{{ old('nombre') }}" required>
        @error('nombre')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="especie">Especie</label>
        <select id="especie" name="especie" required>
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Mascota::ESPECIES as $opcion)
                <option value="{{ $opcion }}" @selected(old('especie') === $opcion)>{{ ucfirst($opcion) }}</option>
            @endforeach
        </select>
        @error('especie')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="propietario">Propietario</label>
        <input id="propietario" name="propietario" type="text" maxlength="100" value="{{ old('propietario') }}" required>
        @error('propietario')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" required>
        @error('fecha_nacimiento')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ route('mascotas.index') }}">Cancelar</a>
        </p>
    </form>
@endsection