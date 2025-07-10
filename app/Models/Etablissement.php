<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Etablissement extends Authenticatable
{
    protected $guard = 'etablissement';
    
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'region',
        'password',
    ];
}
