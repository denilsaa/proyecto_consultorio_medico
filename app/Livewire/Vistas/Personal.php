<?php

namespace App\Livewire\Vistas;

use Livewire\Component;

class Personal extends Component
{
    public $cabeceras = [
        'Nombre',
        'Fecha de Contratación',
        'Turno',
        'Cargo',
        'Telefono',
        'Estado',
        ''
    ];
    public function render()
    {
        return view('livewire.vistas.personal');
    }
}
