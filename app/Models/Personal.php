<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

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
}
