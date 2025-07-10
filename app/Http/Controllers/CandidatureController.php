<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;

class CandidatureController extends Controller
{
    public function index()
    {
        $candidatures = Candidature::with(['chirurgien', 'intervention'])->orderBy('created_at', 'desc')->get();
        return view('Candidature.index', compact('candidatures'));
    }

    public function show($id)
    {
        $candidature = Candidature::with(['chirurgien', 'intervention'])->findOrFail($id);
        return view('Candidature.show', compact('candidature'));
    }

    public function create()
    {
        return view('Candidature.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'chirurgien_id' => 'required|exists:chirurgiens,id',
            'intervention_id' => 'required|exists:interventions,id',
            'statut' => 'required',
            'message' => 'nullable'
        ]);
        Candidature::create($request->all());
        return redirect()->route('candidatures.index')->with('success', 'Candidature envoyée !');
    }

    public function edit($id)
    {
        $candidature = Candidature::findOrFail($id);
        return view('Candidature.edit', compact('candidature'));
    }

    public function update(Request $request, $id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->update($request->all());
        return redirect()->route('candidatures.index')->with('success', 'Candidature modifiée !');
    }

    public function destroy($id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->delete();
        return redirect()->route('candidatures.index')->with('success', 'Candidature supprimée !');
    }
} 