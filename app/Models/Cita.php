<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function historials()
    {
        return $this->hasMany(Historial::class);
    }

    public function recibos()
    {
        return $this->hasOne(Recibo::class);
    }
}
