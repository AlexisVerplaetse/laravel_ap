<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;

Route::get('/', function () {
    return view('Connexion');
});


Route::post('/login', [ConnexionController::class, 'Con']);


