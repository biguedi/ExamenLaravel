<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatForm extends Model
{
    use HasFactory;
    protected $table = 'candidat_forms';

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
