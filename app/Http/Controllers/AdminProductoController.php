<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class AdminProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'categoria' => 'required',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create([
            'nombre'      => $request->nombre,
            'categoria'   => $request->categoria,
            'precio'      => $request->consultar ? null : $request->precio,
            'consultar'   => $request->consultar ? true : false,
            'disponible'  => $request->disponible ? true : false,
            'imagen'      => $imagenPath,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre'    => 'required',
            'categoria' => 'required',
        ]);

        $imagenPath = $producto->imagen;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update([
            'nombre'      => $request->nombre,
            'categoria'   => $request->categoria,
            'precio'      => $request->consultar ? null : $request->precio,
            'consultar'   => $request->consultar ? true : false,
            'disponible'  => $request->disponible ? true : false,
            'imagen'      => $imagenPath,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente');
    }
}