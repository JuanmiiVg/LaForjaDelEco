<?php

use App\Models\inventario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inventario',function(){
    return view('inventario');
});