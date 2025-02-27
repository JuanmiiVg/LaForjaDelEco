<?php

use App\Http\Controllers\auth\ProviderController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Socialite
//use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

// Ruta que muestra el inventario del personaje
Route::get("/user/{id}", [UserController::class, "index"])->name("user.index");

//Rutas para eliminar elementos del inventario
Route::delete('/user/{id}/eliminarArma/{idArm}', [UserController::class, 'deleteArma'])->name("arma.eliminar");
Route::delete('/user/{id}/eliminarPocion/{idPoc}', [UserController::class, 'deletePocion'])->name("pocion.eliminar");
Route::delete('/user/{id}/eliminarMaterial/{idMat}', [UserController::class, 'deleteMaterial'])->name("material.eliminar");
Route::delete('/user/{id}/eliminarIngrediente/{idIng}', [UserController::class, 'deleteIngrediente'])->name("ingrediente.eliminar");

//Rutas para editar las caracteristicas del personaje
Route::get('/user/{id}/caracteristicas/{idC}', [CaracteristicasController::class, 'edit'])->name("caracteristicas.edit");
Route::patch('/user/{id}/caracteristicas/{idC}', [CaracteristicasController::class, 'update'])->name("caracteristicas.update");

//Rutas para equipar elemntos del inventario



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
