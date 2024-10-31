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
        'personal_id',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
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
        return $this->hasMany(PresentacionFarmaco::class);
    }

    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }
}
