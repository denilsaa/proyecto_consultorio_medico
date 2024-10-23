<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Farmaco extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'fecha_vencimiento',
        'personal_id',
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }

    public function historial()
    {
        return $this->belongsToMany(Historial::class);
    }

    public function presentaciones()
    {
        return $this->belongsToMany(Presentacion::class, 'presentacion_farmaco', 'farmaco_id', 'presentacion_id');
    }

    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function cantidad(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (int) $value,
            set: fn($value) => (int) $value,
        );
    }

    protected function fechaVencimiento(): Attribute
    {
        return Attribute::make(
            get: fn($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
            set: fn($value) => \Carbon\Carbon::parse($value)->toDateString(),
        );
    }
}
