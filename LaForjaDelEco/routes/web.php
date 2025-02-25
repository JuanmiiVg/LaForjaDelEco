<?php

use App\Http\Controllers\inventarioControler;
use App\Http\Controllers\personajeController;
use App\Models\inventario;
use App\Models\personaje;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Ruta que muestra el inventario del personaje
Route::get("/personaje/{id}",[personajeController::class,"index"])->name("inventario");
//Rutas para borrar
Route::get("personaje/{id}/eliminar/{idArm}",[personajeController::class,"deleteArma"])->name("arma.eliminar");
Route::get("personaje/{id}/eliminar/{idPoc}",[personajeController::class,"deletePocion"])->name("pocion.eliminar");
Route::get("personaje/{id}/eliminar/{idMat}",[personajeController::class,"deleteMaterial"]);
Route::get("personaje/{id}/eliminar/{idIng}",[personajeController::class,"deleteIngrediente"]);