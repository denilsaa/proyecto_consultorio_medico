<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'fecha_contrato',
        'turno',
        'cargo',
        'usuario_id'
    ];

    protected $hidden = [
        'usuario_id',
        'created_at',
        'updated_at'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function farmacos()
    {
        return $this->hasMany(Farmaco::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    protected function fechaContrato(): Attribute
    {
        return Attribute::make(
            set: fn($value) => \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d'),
            get: fn($value) => \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y')
        );
    }

    protected function turno(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value)
        );
    }

    protected function cargo(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value)
        );
    }
}
