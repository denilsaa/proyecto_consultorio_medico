<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'motivo',
        'confirmada',
        'paciente_id',
        'personal_id',
    ];

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

    protected function fecha(): Attribute
    {
        return Attribute::make(
            set: fn($value) => \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d'),
            get: fn($value) => \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y')
        );
    }

    protected function hora(): Attribute
    {
        return Attribute::make(
            get: fn($value) => \Carbon\Carbon::parse($value)->format('H:i'),
            set: fn($value) => \Carbon\Carbon::createFromFormat('H:i', $value)->format('H:i:s'),
        );
    }

    protected function motivo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function confirmada(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (bool) $value,
            set: fn($value) => $value ? 1 : 0,
        );
    }

    protected function pacienteId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (int) $value,
            set: fn($value) => (int) $value,
        );
    }

    protected function personalId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (int) $value,
            set: fn($value) => (int) $value,
        );
    }
}
