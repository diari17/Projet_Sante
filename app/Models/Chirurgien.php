<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Intervention;
use App\Models\Intervention;
class Chirurgien extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'idChirurgien';
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
    public function candidatures()
    {
        return $this->hasMany(Candidater::class, 'idChirurgien');
    }

    public function interventions()
    {
        return $this->belongsToMany(Intervention::class, 'candidaters', 'idChirurgien', 'idIntervention')
                    ->withPivot(['date', 'etat', 'tarif'])
                    ->withTimestamps();
    }
}
