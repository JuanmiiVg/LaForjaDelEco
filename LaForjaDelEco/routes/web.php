<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;
use App\Models\inventario;
use App\Models\personaje;


Route::get('/', function () {
    return view('welcome');
});

// Ruta que muestra el inventario del personaje
Route::get("/personaje/{id}", [PersonajeController::class, "index"])->name("personaje.index");

Route::delete('/personaje/{id}/eliminarArma/{idArm}', [PersonajeController::class, 'deleteArma'])->name("arma.eliminar");
Route::delete('/personaje/{id}/eliminarPocion/{idPoc}', [PersonajeController::class, 'deletePocion'])->name("pocion.eliminar");
Route::delete('/personaje/{id}/eliminarMaterial/{idMat}', [PersonajeController::class, 'deleteMaterial'])->name("material.eliminar");
Route::delete('/personaje/{id}/eliminarIngrediente/{idIng}', [PersonajeController::class, 'deleteIngrediente'])->name("ingrediente.eliminar");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
