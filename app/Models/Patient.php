<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Intervention;
// use Intervention;
class Patient extends Model
{
    protected $primaryKey = 'idPatient';

    protected $fillable = [
        'nom', 'prenom', 'age', 'sexe', 'antecedents'
    ];

    // Un patient peut avoir plusieurs interventions
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'idPatient');
    }
}