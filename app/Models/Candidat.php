<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    //protected $guarded = [];
    protected $fillable = [
        'nom', 'prenom', 'email', 'age','niveauEtude','sexe','formation'
    ];

    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'candidat_forms', 'candidat_id', 'formation_id');
    }
}