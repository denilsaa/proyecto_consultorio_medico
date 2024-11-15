<?php

namespace App\Livewire;

use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class NewCita extends Component
{
    public $open = false;

    #[Validate('required|max:20|min:3|regex:/^[^\s].*$/')]
    public $motivo;
    #[Validate('required|date')]
    public $fecha;
    #[Validate('required')]
    public $hora;

    public function render()
    {
        return view('livewire.new-cita');
    }

    public function close()
    {
        $this->open = false;
    }
    public function save()
    {
        $user = Auth::user()->pacientes->first();

        $cita = new Cita();
        $cita->paciente_id = $user->id;
        $cita->fecha = date('d-m-y', strtotime($this->fecha));
        $cita->hora = date('H:i:s', strtotime($this->hora));
        $cita->motivo = $this->motivo;
        $cita->save();
    }
}
