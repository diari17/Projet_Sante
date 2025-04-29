<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Etablissement extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'statut', 'region', 'telephone', 'password',
        'nomRes', 'fonctionRes', 'adresse', 'nom', 'email'
    ];
}
