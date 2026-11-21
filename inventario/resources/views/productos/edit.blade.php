@extends('layouts.app')

@section('titulo', 'Editar producto')

@section('contenido')
    <h1>Editar producto</h1>

    <form method="POST" action="{{ route('productos.update', $producto->id) }}">
        @csrf
        @method('PUT')

        <label for="codigo">Código</label>
        <input id="codigo" name="codigo" type="text" maxlength="20" value="{{ old('codigo', $producto->codigo) }}" required>
        @error('codigo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" maxlength="100" value="{{ old('nombre', $producto->nombre) }}" required>
        @error('nombre')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" min="0.01" step="0.01" value="{{ old('precio', $producto->precio) }}" required>
        @error('precio')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="existencias">Existencias</label>
        <input id="existencias" name="existencias" type="number" min="0" step="1" value="{{ old('existencias', $producto->existencias) }}" required>
        @error('existencias')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Actualizar</button>
            <a href="{{ route('productos.index') }}">Cancelar</a>
        </p>
    </form>
@endsection