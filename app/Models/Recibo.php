<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Nette\Utils\Strings;

class Recibo extends Model
{
    use HasFactory;

    protected $filable = [
        'fecha',
        'metodo_pago',
        'monto',
        'descripcion',
        'cita_id',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    protected function fecha(): Attribute
    {
        return Attribute::make(
            get: fn($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
            set: fn($value) => \Carbon\Carbon::createFromFormat('d-m-Y', (string) $value)->toDateString(),
        );
    }

    protected function metodoPago(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function monto(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 2),
            set: fn($value) => str_replace(',', '', $value),
        );
    }

    protected function descripcion(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function citaId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (int) $value,
            set: fn($value) => (int) $value,
        );
    }
}
