<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Intervention;
use App\Models\Patient;
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

    public function traitementCreerIntervention(Request $request){

        // Validation des données
        $request->validate([
            'nomPatient' => 'required|string|max:255',
            'agePatient' => 'required|string|max:255',
            'sexePatient' => 'required|string|max:255',
            'maladie' => 'required|string|max:255',

            'typeInt' => 'required|string|max:255',
            'speRequise' => 'required|string|max:255',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'duree' => 'required|integer|min:1',
            'niveau' => 'required|string|max:255',
            'renumeration' => 'required|numeric|min:0',
            'details' => 'string|max:255',
        ]);
        // Création de l'intervention
        $intervention = new Intervention();
        $intervention->date = $request->date;
        $intervention->heure = $request->heure;
        $intervention->duree = $request->duree;
        $intervention->niveau = $request->niveau;
        $intervention->renumeration = $request->renumeration;
        $intervention->SpeRequise = $request->speRequise;
        $intervention->typeInt = $request->typeInt;
        $intervention->details = $request->details;
        // $intervention->hopital = Intervention::find(Auth::id());
        $patient = new Patient();
        $patient->nomPatient = $request->nomPatient;
        $patient->agePatient = $request->agePatient;
        $patient->sexePatient = $request->sexePatient;
        $patient->maladie = $request->maladie;
        // $test = Auth::id();
        
        

        // dd($patient);

        

        // dd($test);
        // $intervention->save();

        return redirect('/')->with('success', 'Intervention créée avec succès !');

    }
   
}
