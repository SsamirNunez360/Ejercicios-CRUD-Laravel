@extends('layouts.app')

@section('titulo', 'Crear producto')

@section('contenido')
    <h1>Crear producto</h1>

    <form method="POST" action="{{ route('productos.store') }}">
        @csrf

        <label for="codigo">Código</label>
        <input id="codigo" name="codigo" type="text" maxlength="20" value="{{ old('codigo') }}" required>
        @error('codigo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" maxlength="100" value="{{ old('nombre') }}" required>
        @error('nombre')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" min="0.01" step="0.01" value="{{ old('precio') }}" required>
        @error('precio')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="existencias">Existencias</label>
        <input id="existencias" name="existencias" type="number" min="0" step="1" value="{{ old('existencias') }}" required>
        @error('existencias')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ route('productos.index') }}">Cancelar</a>
        </p>
    </form>
@endsection