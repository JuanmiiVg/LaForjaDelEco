<?php

use App\Http\Controllers\inventarioControler;
use App\Http\Controllers\personajeController;
use App\Models\inventario;
use App\Models\personaje;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/personaje/{id}",[personajeController::class,"index"]);

