<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Receta extends Model
{
    use HasFactory;

    protected $filable = [
        'cantidad',
        'indicaciones',
        'farmaco_id',
        'historial_id',
    ];

    public function presentacionFarmaco()
    {
        return $this->belongsTo(PresentacionFarmaco::class);
    }

    public function historial()
    {
        return $this->belongsTo(Historial::class);
    }

    protected function cantidad(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => $value
        );
    }

    protected function indicaciones(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value)
        );
    }

    protected function farmacoId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => $value
        );
    }

    protected function historialId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => $value
        );
    }
}
