<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirurgien;
use App\Models\Etablissement;
use App\Models\Moderateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ModerateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:moderateur');
    }

    // Afficher le tableau de bord
    public function dashboard()
    {
        // Récupérer les chirurgiens en attente
        $chirurgiens = Chirurgien::where('status', 'pending')->get();
        
        // Récupérer les établissements en attente
        $etablissements = Etablissement::where('status', 'pending')->get();
        
        return view('Moderateur.DashMod', compact('chirurgiens', 'etablissements'));
    }

    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('Moderateur.Connexion');
    }

    // Traiter la connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('moderateur')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('moderateur/dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::guard('moderateur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Approuver un chirurgien
    public function approveChirurgien($id)
    {
        $chirurgien = Chirurgien::findOrFail($id);
        $chirurgien->status = 'approved';
        $chirurgien->save();

        return response()->json([
            'success' => true,
            'message' => 'Chirurgien approuvé avec succès'
        ]);
    }

    // Approuver un établissement
    public function approveEtablissement($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->status = 'approved';
        $etablissement->save();

        return response()->json([
            'success' => true,
            'message' => 'Établissement approuvé avec succès'
        ]);
    }

    // Rejeter un chirurgien
    public function rejectChirurgien($id)
    {
        $chirurgien = Chirurgien::findOrFail($id);
        $chirurgien->status = 'rejected';
        $chirurgien->save();

        return response()->json([
            'success' => true,
            'message' => 'Chirurgien rejeté avec succès'
        ]);
    }

    // Rejeter un établissement
    public function rejectEtablissement($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->status = 'rejected';
        $etablissement->save();

        return response()->json([
            'success' => true,
            'message' => 'Établissement rejeté avec succès'
        ]);
    }

    // Supprimer un chirurgien
    public function deleteChirurgien($id)
    {
        $chirurgien = Chirurgien::findOrFail($id);
        
        // Supprimer les documents associés
        if ($chirurgien->documents) {
            foreach ($chirurgien->documents as $document) {
                Storage::delete($document->path);
            }
        }
        
        $chirurgien->delete();

        return response()->json([
            'success' => true,
            'message' => 'Chirurgien supprimé avec succès'
        ]);
    }

    // Supprimer un établissement
    public function deleteEtablissement($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        
        // Supprimer les documents associés
        if ($etablissement->documents) {
            foreach ($etablissement->documents as $document) {
                Storage::delete($document->path);
            }
        }
        
        $etablissement->delete();

        return response()->json([
            'success' => true,
            'message' => 'Établissement supprimé avec succès'
        ]);
    }

    // Restaurer un chirurgien rejeté
    public function restoreChirurgien($id)
    {
        $chirurgien = Chirurgien::findOrFail($id);
        $chirurgien->status = 'pending';
        $chirurgien->save();

        return response()->json([
            'success' => true,
            'message' => 'Chirurgien restauré avec succès'
        ]);
    }

    // Restaurer un établissement rejeté
    public function restoreEtablissement($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->status = 'pending';
        $etablissement->save();

        return response()->json([
            'success' => true,
            'message' => 'Établissement restauré avec succès'
        ]);
    }

    // Obtenir les détails d'un chirurgien
    public function getChirurgienDetails($id)
    {
        $chirurgien = Chirurgien::with('documents')->findOrFail($id);
        return response()->json($chirurgien);
    }

    // Obtenir les détails d'un établissement
    public function getEtablissementDetails($id)
    {
        $etablissement = Etablissement::with('documents')->findOrFail($id);
        return response()->json($etablissement);
    }

    // Filtrer les utilisateurs
    public function filterUsers(Request $request)
    {
        $type = $request->type ?? 'all';
        $status = $request->status ?? 'all';
        $search = $request->search ?? '';

        if ($type === 'all' || $type === 'chirurgien') {
            $chirurgiens = Chirurgien::query()
                ->when($status !== 'all', function($query) use ($status) {
                    return $query->where('status', $status);
                })
                ->when($search, function($query) use ($search) {
                    return $query->where(function($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%")
                          ->orWhere('specialite', 'like', "%{$search}%");
                    });
                })
                ->get();
        }

        if ($type === 'all' || $type === 'etablissement') {
            $etablissements = Etablissement::query()
                ->when($status !== 'all', function($query) use ($status) {
                    return $query->where('status', $status);
                })
                ->when($search, function($query) use ($search) {
                    return $query->where(function($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%")
                          ->orWhere('type', 'like', "%{$search}%");
                    });
                })
                ->get();
        }

        return response()->json([
            'chirurgiens' => $chirurgiens ?? collect(),
            'etablissements' => $etablissements ?? collect()
        ]);
    }
}
