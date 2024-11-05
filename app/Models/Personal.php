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
            set: fn($value) => date('d-m-y', strtotime($value)),
            get: fn($value) => date('d-m-Y', strtotime($value))
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
