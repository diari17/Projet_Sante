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

Route::get('/DashMed', function () {
    return view('Medecin/DashMed');
});

Route::get('/DashHospi', function () {
    return view('Hôpital/DashHospi');
});