<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Triaje extends Model
{
    use HasFactory;

    protected $filable = [
        'temperatura',
        'presion_arterial',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'peso',
        'altura',
        'historial_id',
    ];

    public function historial()
    {
        return $this->belongsTo(Historial::class);
    }
    protected function temperatura(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 1) . ' °C',
            set: fn($value) => str_replace(' °C', '', $value),
        );
    }

    protected function presionArterial(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value . ' mmHg',
            set: fn($value) => str_replace(' mmHg', '', $value),
        );
    }

    protected function frecuenciaCardiaca(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value . ' bpm',
            set: fn($value) => str_replace(' bpm', '', $value),
        );
    }

    protected function frecuenciaRespiratoria(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value . ' breaths/min',
            set: fn($value) => str_replace(' breaths/min', '', $value),
        );
    }

    protected function peso(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 2) . ' kg',
            set: fn($value) => str_replace(' kg', '', $value),
        );
    }

    protected function altura(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 2) . ' cm',
            set: fn($value) => str_replace(' cm', '', $value),
        );
    }
}
