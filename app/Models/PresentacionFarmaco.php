<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentacionFarmaco extends Model
{
    use HasFactory;

    protected $table = 'presentacion_farmaco';

    protected $fillable = [
        'farmaco_id',
        'presentacion_id',
    ];

    public function farmaco()
    {
        return $this->belongsTo(Farmaco::class);
    }

    public function presentacion()
    {
        return $this->belongsTo(Presentacion::class);
    }
}
