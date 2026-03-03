<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracion;

class AdminConfiguracionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $configuraciones = Configuracion::all();
        return view('admin.configuracion.index', compact('configuraciones'));
    }

    public function update(Request $request)
    {
        foreach ($request->config as $clave => $valor) {
            Configuracion::where('clave', $clave)->update(['valor' => $valor]);
        }
        return redirect()->route('admin.configuracion.index')->with('success', 'Configuración guardada correctamente');
    }
}