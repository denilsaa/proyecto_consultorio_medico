<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Presentacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre',];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function farmacos()
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
