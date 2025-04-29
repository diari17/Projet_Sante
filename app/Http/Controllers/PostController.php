<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirurgien;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    //
    public function ListMed(){

        $chirurgien = Chirurgien::all();
        return view('Hopital.ListMed', compact('chirurgien'));
    }
   
}
