<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Chirurgien extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'region',
        'specialite',
        'exp',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    
}
