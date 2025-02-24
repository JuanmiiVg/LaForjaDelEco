<?php

use App\Http\Controllers\inventarioControler;
use App\Models\inventario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/inventario",[inventarioControler::class,"mostrarInventario"])->name("inventario.index");