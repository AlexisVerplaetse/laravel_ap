<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Connexion;  // ton modèle

class ConnexionController extends Controller
{
    public function Con(Request $request)
    {
        $pseudo = $request->Pseudo;
        $password = $request->password;

        $user = Connexion::where('login', $pseudo)
                         ->where('mdp', $password)
                         ->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Pseudo ou mot de passe incorrect']);
        }

        return view('accueil');
    }
}
