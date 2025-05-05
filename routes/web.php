<?php

use App\Http\Controllers\ChirurgienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HopitalController;
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

Route::post('traitementCreerIntervention', [HopitalController::class, 'traitementCreerIntervention']);

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