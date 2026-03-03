<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Str;

class AdminCategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre'
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'slug'   => Str::slug($request->nombre)
        ]);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,'.$id
        ]);

        $categoria->update([
            'nombre' => $request->nombre,
            'slug'   => Str::slug($request->nombre)
        ]);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada correctamente');
    }
}