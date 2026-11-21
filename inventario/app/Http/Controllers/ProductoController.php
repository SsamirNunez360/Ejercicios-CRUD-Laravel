<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

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
}