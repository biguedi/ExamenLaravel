<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'duree', 'description','isStarted','date_debut','referntiel_id'
    ];

    public function candidats()
    {
        return $this->belongsToMany(Candidat::class, 'candidat_forms', 'formation_id', 'candidat_id');
    }

    public function referentiel()
    {
        return $this->belongsTo(Referentiel::class);
    }

}
