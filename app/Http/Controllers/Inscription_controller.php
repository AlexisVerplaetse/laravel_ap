<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Connexion;
use Illuminate\Support\Facades\Hash;

class Inscription_controller extends Controller
{
    public function register(Request $request)
    {
            //valider les données 
           $request->validate([
            'email' => 'required|email|unique:connexion,email',
            'password' => 'required|min:6|confirmed',
        ]);

        //insertion dans la base
        Connexion::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //redirection vers la page welcom
        return view('accueil');
    }
}
*/