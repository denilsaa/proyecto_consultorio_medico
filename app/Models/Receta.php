<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    public function farmaco()
    {
        return $this->belongsTo(Farmaco::class);
    }

    public function historial()
    {
        return $this->belongsTo(Historial::class);
    }
}
