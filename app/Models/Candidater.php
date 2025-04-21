<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Intervention;

class Candidater extends Pivot
{
    protected $table = 'candidaters';

    protected $fillable = [
        'idChirurgien', 'idIntervention', 'date', 'etat', 'tarif'
    ];

    public function chirurgien()
    {
        return $this->belongsTo(Chirurgien::class, 'idChirurgien');
    }

    public function intervention()
    {
        return $this->belongsTo(Intervention::class, 'idIntervention');
    }
}
