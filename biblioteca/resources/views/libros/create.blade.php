@extends('layouts.app')

@section('titulo', 'Crear libro')

@section('contenido')
    <h1>Crear libro</h1>

    <form method="POST" action="{{ route('libros.store') }}">
        @csrf

        <label for="codigo">Código</label>
        <input id="codigo" name="codigo" type="text" maxlength="20" value="{{ old('codigo') }}" required>
        @error('codigo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="titulo">Título</label>
        <input id="titulo" name="titulo" type="text" maxlength="150" value="{{ old('titulo') }}" required>
        @error('titulo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="autor">Autor</label>
        <input id="autor" name="autor" type="text" maxlength="100" value="{{ old('autor') }}" required>
        @error('autor')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="anio_publicacion">Año de publicación</label>
        <input id="anio_publicacion" name="anio_publicacion" type="number" min="1450" max="{{ date('Y') }}" step="1" value="{{ old('anio_publicacion') }}" required>
        @error('anio_publicacion')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ route('libros.index') }}">Cancelar</a>
        </p>
    </form>
@endsection