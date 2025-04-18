<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirurgien;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
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
            'nom',
            'prenom',
            'email',
            'telephone',
            'exp',
            'region',
            'password',
            'specialite'
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


    }

    public function traitementConnexion(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // $email = $request->email;
        // $password = $request->password;

        // dd($email, $password);
        if (Auth::guard('chirurgien')->attempt($credentials)) {
            return view('Medecin.DashMed');
        }

        return "not good";
    
    }
}
