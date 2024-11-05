<?php

namespace App\Livewire\Vistas;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\PresentacionFarmaco;
use Livewire\Component;

class Dashboard extends Component
{
    public $cantidadPacientes, $cantidadCitas, $cantidadFarmacos;

    public function mount()
    {
        $this->cantidadPacientes = Paciente::count();
        $this->cantidadCitas = Cita::count();
        $this->cantidadFarmacos = PresentacionFarmaco::count();
    }

    public function render()
    {
        return view('livewire.vistas.home');
    }
}
