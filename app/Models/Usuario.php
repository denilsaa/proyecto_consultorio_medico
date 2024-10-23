<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    //Tabla
    protected $table = 'usuarios';

    // Campos de la tabla que se pueden llenar 
    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'estado_usuario',
        'correo',
        'telefono',
        'carnet',
        'password',
    ];

    // Campos que no se pueden llenar
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'correo_verified_at',
    ];

    // Campos que se deben convertir a tipos de datos nativos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Filtros de entrada y salida
    protected function nombre(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value)
        );
    }
    protected function apPaterno(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value)
        );
    }

    protected function apMaterno(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value)
        );
    }

    protected function estadoUsuario(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value)
        );
    }

    protected function correo(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => strtolower($value)
        );
    }

    protected function telefono(): Attribute
    {
        return Attribute::make(
            set: fn($value) => preg_replace('/\D/', '', $value),
            get: fn($value) => $value
        );
    }

    protected function carnet(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtoupper($value),
            get: fn($value) => strtoupper($value)
        );
    }

    //Relaciones 
    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function personal()
    {
        return $this->hasMany(Personal::class);
    }
}
