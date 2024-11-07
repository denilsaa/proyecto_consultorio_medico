<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PresentacionFarmaco extends Model
{
    use HasFactory;

    protected $table = 'presentacion_farmaco';

    protected $fillable = [
        'farmaco_id',
        'presentacion_id',
        'fecha_vencimiento',
        'cantidad',
    ];

    protected $hidden = [
        'farmaco_id',
        'presentacion_id',
    ];

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
            //get: fn($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
            get: fn($value) => (int) \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($value)).' días',
            
            set: fn($value) => \Carbon\Carbon::parse($value)->toDateString(),
        );
    }

    public function farmaco()
    {
        return $this->belongsTo(Farmaco::class);
    }

    public function presentacion()
    {
        return $this->belongsTo(Presentacion::class);
    }
}
