<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminProductoController;
use App\Http\Controllers\AdminCategoriaController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/send-message', [HomeController::class, 'send'])->name('send.message');

Route::get('/productos', function () {
    $productos = \App\Models\Producto::where('disponible', true)->orderBy('created_at', 'desc')->get();
    $categorias = \App\Models\Categoria::orderBy('nombre')->get();
    return view('productos', compact('productos', 'categorias'));
});

Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function () {
    // Productos
    Route::get('/', [AdminProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/productos/crear', [AdminProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/productos', [AdminProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/productos/{id}/editar', [AdminProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/productos/{id}', [AdminProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/productos/{id}', [AdminProductoController::class, 'destroy'])->name('admin.productos.destroy');

    // Categorías
    Route::get('/categorias', [AdminCategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::post('/categorias', [AdminCategoriaController::class, 'store'])->name('admin.categorias.store');
    Route::get('/categorias/{id}/editar', [AdminCategoriaController::class, 'edit'])->name('admin.categorias.edit');
    Route::put('/categorias/{id}', [AdminCategoriaController::class, 'update'])->name('admin.categorias.update');
    Route::delete('/categorias/{id}', [AdminCategoriaController::class, 'destroy'])->name('admin.categorias.destroy');
});