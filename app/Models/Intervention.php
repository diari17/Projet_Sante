<?php


use Illuminate\Database\Eloquent\Model;
use App\Models\Candidater;
use App\Models\Chirurgien;
use App\Models\Patient;
class Intervention extends Model
{
    protected $primaryKey = 'idIntervention';

    protected $fillable = [
        'date', 'SpeRequise', 'hopital', 'idPatient', 'type',
        'heure', 'duree', 'niveau', 'renumeration'
    ];

    // Une intervention appartient à un patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'idPatient');
    }

    // Une intervention peut recevoir plusieurs candidatures
    public function candidatures()
    {
        return $this->hasMany(Candidater::class, 'idIntervention');
    }

    public function chirurgiens()
    {
        return $this->belongsToMany(Chirurgien::class, 'candidaters', 'idIntervention', 'idChirurgien')
                    ->withPivot(['date', 'etat', 'tarif'])
                    ->withTimestamps();
    }
}