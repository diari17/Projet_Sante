<?php

use App\Http\Controllers\ChirurgienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HopitalController;
use App\Http\Controllers\ModerateurController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Accueil');
});

// Route::get('/Login', function () {
//     return view('Login');
// });
Route::get('/Login', [ChirurgienController::class, 'Login']);

Route::post('traitementConnexion', [ChirurgienController::class, 'traitementConnexion']);


Route::get('/Inscription', [ChirurgienController::class , 'Inscription'] );

Route::post('traitementInsChirurgien', [ChirurgienController::class, 'traitementInsChirurgien']);

//Route Medecin
Route::get('/DashMed', function () {
    return view('Medecin/DashMed');
});

Route::get('/MyCandidatures', function () {
    return view('Medecin/MyCandidatures');
});

Route::get('/ListInterv', function () {
    return view('Medecin/ListInterv');
});

Route::get('/MyPropositions', function () {
    return view('Medecin/MyPropositions');
});


//Route Hospi

Route::post('traitementInsHopital', [HopitalController::class, 'traitementInsHopital']);

Route::get('/DashHospi', function () {
    return view('Hopital/DashHospi');
});

Route::get('/CreerInterv', function () {
    return view('Hopital/CreerInterv');
});

//Le new fichier PSSSSSSSSSS
Route::get('/DetailsInterv', function () {
    return view('Hopital/DetailsInterv');
});
Route ::post('traitementCreerPatient', [HopitalController::class, 'traitementCreerPatient']);
Route::post('traitementCreerIntervention', [HopitalController::class, 'traitementCreerIntervention']);
Route::get('DetailsInterv', [HopitalController::class, 'DetailsInterv']);

// Route::get('/ListMed', function () {
//     return view('Hopital/ListMed');
// });
Route::get('/ListMed', [PostController::class, 'ListMed'  ]);

Route::get('/ListCandidatures', function () {
    return view('Hopital/ListCandidatures');
});

Route::get('/SendPropositions', function () {
    return view('Hopital/SendPropositions');
});




Route::get('/Connexion', function () {
    return view('Moderateur/Connexion');
});

Route::get('/DashMod', function () {
    return view('Moderateur/DashMod');
});
Route::prefix('moderateur')->group(function () {
    Route::get('login', [ModerateurController::class, 'showLoginForm'])->name('moderateur.login');
    Route::post('login', [ModerateurController::class, 'login']);
    Route::post('logout', [ModerateurController::class, 'logout'])->name('moderateur.logout');
    
    Route::middleware('auth:moderateur')->group(function () {
        Route::get('dashboard', [ModerateurController::class, 'dashboard'])->name('moderateur.dashboard');
        
        // Routes pour les chirurgiens
        Route::post('chirurgiens/{id}/approve', [ModerateurController::class, 'approveChirurgien']);
        Route::post('chirurgiens/{id}/reject', [ModerateurController::class, 'rejectChirurgien']);
        Route::delete('chirurgiens/{id}', [ModerateurController::class, 'deleteChirurgien']);
        Route::post('chirurgiens/{id}/restore', [ModerateurController::class, 'restoreChirurgien']);
        Route::get('chirurgiens/{id}', [ModerateurController::class, 'getChirurgienDetails']);
        
        // Routes pour les établissements
        Route::post('etablissements/{id}/approve', [ModerateurController::class, 'approveEtablissement']);
        Route::post('etablissements/{id}/reject', [ModerateurController::class, 'rejectEtablissement']);
        Route::delete('etablissements/{id}', [ModerateurController::class, 'deleteEtablissement']);
        Route::post('etablissements/{id}/restore', [ModerateurController::class, 'restoreEtablissement']);
        Route::get('etablissements/{id}', [ModerateurController::class, 'getEtablissementDetails']);
        
        // Route de filtrage
        Route::get('filter', [ModerateurController::class, 'filterUsers']);
    });
});