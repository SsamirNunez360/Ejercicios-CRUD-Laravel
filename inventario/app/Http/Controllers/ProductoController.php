<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id')->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:20', 'unique:productos,codigo'],
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'gt:0'],
            'existencias' => ['required', 'integer', 'min:0'],
        ]);

        $producto = new Producto();
        $producto->codigo = $datos['codigo'];
        $producto->nombre = $datos['nombre'];
        $producto->precio = $datos['precio'];
        $producto->existencias = $datos['existencias'];
        $producto->save();

        return redirect()
            ->route('productos.index')
            ->with('exito', 'Producto creado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:20', Rule::unique('productos', 'codigo')->ignore($producto)],
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'gt:0'],
            'existencias' => ['required', 'integer', 'min:0'],
        ]);

        $producto->codigo = $datos['codigo'];
        $producto->nombre = $datos['nombre'];
        $producto->precio = $datos['precio'];
        $producto->existencias = $datos['existencias'];
        $producto->save();

        return redirect()
            ->route('productos.index')
            ->with('exito', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('exito', 'Producto eliminado correctamente.');
    }
}