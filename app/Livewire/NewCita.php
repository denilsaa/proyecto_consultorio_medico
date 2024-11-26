<?php

namespace App\Livewire;

use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class NewCita extends Component
{
    public $open = false;
    public $horarios = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'];



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
        $this->fecha = \Carbon\Carbon::parse($this->fecha)->format('d/m/Y');
       // dd($this->fecha, $this->hora, $this->motivo, $user->id);

        $cita = new Cita();
        $cita->paciente_id = $user->id;
        $cita->fecha = $this->fecha;
        $cita->hora = $this->hora;
        $cita->motivo = $this->motivo;
        $cita->save();
        $this->dispatch('new_cita');
        $this->resetInput();
    }
    private function resetInput()
    {
        $this->open = false;
        $this->motivo = null;
        $this->fecha = null;
        $this->hora = null;
    }

    public function openModal()
    {
        $this->open = true;
    }
}
