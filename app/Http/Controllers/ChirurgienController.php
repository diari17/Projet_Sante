<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirurgien;
use Illuminate\Support\Facades\Auth;

class ChirurgienController extends Controller
{
    //
    public function Inscription(){
        return view('Inscription');
    }

    public function Login(){
        return view('Login');
    }

    public function traitementInsChirurgien(Request $request){
        $request->validate([
            'nom'=> 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'exp' => 'required',
            'region' => 'required',
            'specialite' => 'required',
            'password' => 'required|confirmed', [
                'password.confirmed' => 'Les mots de passe ne sont pas identiques.'
            ]
        ]);

        $nom = $request->nom;
        $prenom = $request->prenom;
        $email = $request->email;
        $telephone = $request->telephone;
        $exp = $request->exp;
        $region = $request->region;
        $password = bcrypt($request->password);
        $specialite =  $request->specialite;

        // dd($nom,  $prenom, $email, $telephone,  $exp, $region, $password, $specialite  );

        $chirurgien = Chirurgien::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'telephone' => $telephone,
            'region' => $region,
            'specialite' => $specialite,
            'exp' => $exp,
            'password' => $password,
        ]);

        // dd($chirurgien);
        $chirurgien->save();

        return view('Login');


    }

   
    public function traitementConnexion(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Essayer d'abord avec Etablissement
        if (Auth::guard('etablissement')->attempt($credentials)) {
            return redirect()->intended('/DashHospi');
        }

        // Essayer ensuite avec Chirurgien
        if (Auth::guard('chirurgien')->attempt($credentials)) {
            return redirect()->intended('/DashMed');
        }

        // Si aucun ne marche
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ]);
    }
}
