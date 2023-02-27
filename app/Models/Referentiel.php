<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referentiel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function formations(){
        return $this->hasMany(Formation::class);
}
public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
