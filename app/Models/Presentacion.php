<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;

    public function farmacos()
    {
        return $this->belongsToMany(Farmaco::class, 'presentacion_farmaco');
    }
}
