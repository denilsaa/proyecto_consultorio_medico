<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'cita_id',
        'diagnostico'
    ];

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

    protected function diagnostico(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }
}
