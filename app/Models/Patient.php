<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention;
class Patient extends Model
{
    protected $primaryKey = 'idPatient';

    protected $fillable = [
        'nom', 'prenom', 'age', 'maladie', 'numero'
    ];

    // Un patient peut avoir plusieurs interventions
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'idPatient');
    }
}