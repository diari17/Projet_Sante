<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;

class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::orderBy('created_at', 'desc')->get();
        return view('Intervention.index', compact('interventions'));
    }

    public function show($id)
    {
        $intervention = Intervention::with(['patient', 'candidatures.chirurgien'])->findOrFail($id);
        return view('Intervention.show', compact('intervention'));
    }

    public function create()
    {
        return view('Intervention.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_intervention' => 'required',
            'date_souhaitee' => 'required|date',
            'description' => 'required',
            'urgence' => 'required'
        ]);
        Intervention::create($request->all());
        return redirect()->route('interventions.index')->with('success', 'Intervention créée !');
    }

    public function edit($id)
    {
        $intervention = Intervention::findOrFail($id);
        return view('Intervention.edit', compact('intervention'));
    }

    public function update(Request $request, $id)
    {
        $intervention = Intervention::findOrFail($id);
        $intervention->update($request->all());
        return redirect()->route('interventions.index')->with('success', 'Intervention modifiée !');
    }

    public function destroy($id)
    {
        $intervention = Intervention::findOrFail($id);
        $intervention->delete();
        return redirect()->route('interventions.index')->with('success', 'Intervention supprimée !');
    }
} 