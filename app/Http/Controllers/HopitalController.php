<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HopitalController extends Controller
{
    //
    public function Inscription()
    {
        return view('Inscription');
    }
    public function traitementInsHopital(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:etablissements',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
            'nomRes' => 'required|string|max:255',
            'fonctionRes' => 'required|string|max:255',
        ]);

        // Création de l'utilisateur
        $etablissement = new Etablissement();
        $etablissement->nom = $request->nom;
        $etablissement->email = $request->email;
        $etablissement->password = bcrypt($request->password);
        $etablissement->telephone = $request->telephone;
        $etablissement->adresse = $request->adresse;
        $etablissement->region = $request->region;
        $etablissement->statut = $request->statut;
        $etablissement->nomRes = $request->nomRes;
        $etablissement->fonctionRes = $request->fonctionRes;
        // dd($etablissement);
        $etablissement->save();

        return redirect('/')->with('success', 'Inscription réussie !');
    }
   
}
