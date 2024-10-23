<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Presentacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre',];

    public function farmacos()
    {
        return $this->belongsToMany(Farmaco::class, 'presentacion_farmaco', 'presentacion_id', 'farmaco_id');
    }
    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }
}
