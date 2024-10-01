<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmaco extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(Presentacion::class, 'presentacion_farmaco');
    }
}
