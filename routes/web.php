<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Inscription', function () {
    return view('Inscription');
});


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
Route::get('/DashHospi', function () {
    return view('Hôpital/DashHospi');
});

Route::get('/CreerInterv', function () {
    return view('Hôpital/CreerInterv');
});

Route::get('/ListMed', function () {
    return view('Hôpital/ListMed');
});

Route::get('/ListCandidatures', function () {
    return view('Hôpital/ListCandidatures');
});

Route::get('/SendPropositions', function () {
    return view('Hôpital/SendPropositions');
});