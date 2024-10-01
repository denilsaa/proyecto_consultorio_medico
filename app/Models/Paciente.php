<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function historials()
    {
        return $this->hasMany(Historial::class);
    }
}