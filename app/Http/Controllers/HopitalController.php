<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Intervention;
use App\Models\Patient;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

class HopitalController extends Controller
{
    public function dashboard()
    {
        $etablissement = Auth::guard('etablissement')->user();
        $interventions = Intervention::where('etablissement_id', $etablissement->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('Hopital/DashHospi', compact('etablissement', 'interventions'));
    }

    public function createIntervention()
    {
        return view('Hopital/CreerInterv');
    }

    public function traitementCreerIntervention(Request $request)
    {
        $request->validate([
            'type_intervention' => 'required',
            'date_souhaitee' => 'required|date',
            'description' => 'required',
            'urgence' => 'required'
        ]);

        $etablissement = Auth::guard('etablissement')->user();

        Intervention::create([
            'etablissement_id' => $etablissement->id,
            'type_intervention' => $request->type_intervention,
            'date_souhaitee' => $request->date_souhaitee,
            'description' => $request->description,
            'urgence' => $request->urgence,
            'statut' => 'ouvert'
        ]);

        return redirect('/DashHospi')->with('success', 'Intervention créée avec succès');
    }

    public function detailsIntervention($id)
    {
        $intervention = Intervention::with(['patient', 'candidatures.chirurgien'])
            ->findOrFail($id);

        return view('Hopital/DetailsInterv', compact('intervention'));
    }

    public function listMedecins()
    {
        $chirurgiens = \App\Models\Chirurgien::where('statut', 'validé')
            ->orderBy('specialite')
            ->get();

        return view('Hopital/ListMed', compact('chirurgiens'));
    }

    public function listCandidatures()
    {
        $etablissement = Auth::guard('etablissement')->user();
        $candidatures = Candidature::whereHas('intervention', function($query) use ($etablissement) {
            $query->where('etablissement_id', $etablissement->id);
        })->with(['chirurgien', 'intervention'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('Hopital/ListCandidatures', compact('candidatures'));
    }

    public function sendPropositions()
    {
        $etablissement = Auth::guard('etablissement')->user();
        $interventions = Intervention::where('etablissement_id', $etablissement->id)
            ->where('statut', 'ouvert')
            ->get();

        return view('Hopital/SendPropositions', compact('interventions'));
    }

    public function logout()
    {
        Auth::guard('etablissement')->logout();
        return redirect('/');
    }

    public function traitementCreerPatient(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required|numeric',
            'sexe' => 'required',
            'antecedents' => 'nullable'
        ]);

        \App\Models\Patient::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'sexe' => $request->sexe,
            'antecedents' => $request->antecedents,
        ]);

        return redirect()->back()->with('success', 'Patient créé avec succès');
    }

    public function traitementInsHopital(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:etablissements,email',
            'region' => 'required',
            'statut' => 'required',
            'password' => 'required|confirmed',
        ]);

        \App\Models\Etablissement::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'region' => $request->region,
            'statut' => $request->statut,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/Login')->with('success', 'Inscription réussie, vous pouvez vous connecter.');
    }
}
