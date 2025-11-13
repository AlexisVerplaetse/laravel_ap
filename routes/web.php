<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Connexion');
});


Route::post('/login', function () {
    return redirect('/accueil'); 
});

Route::get('/accueil', function (){
    return view('accueil');
});
