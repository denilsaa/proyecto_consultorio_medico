<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }

    public function triajes()
    {
        return $this->hasMany(Triaje::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
