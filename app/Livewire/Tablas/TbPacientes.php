<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Paciente;
use Illuminate\Support\Str;

class TbPacientes extends Component
{
    public $pacientes;

    public $search = '';

    public $sort = 'id';

    public $direction = 'desc';

    public function mount()
    {
        $this->updatePacientes();
    }

    public function updatedSearch()
    {
        $this->updatePacientes();
    }
    public function updatePacientes()
    {
        $this->search = Str::lower($this->search);
        $this->pacientes = Paciente::select('usuarios.id as usuario_id', 'pacientes.id as paciente_id', 'usuarios.nombre', 'usuarios.ap_paterno', 'usuarios.ap_materno', 'usuarios.correo', 'usuarios.carnet', 'usuarios.estado_usuario', 'usuarios.telefono', 'pacientes.telefono_emergencia')
            ->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
            ->where('usuarios.nombre', 'like', '%' . $this->search . '%')
            ->orWhere('usuarios.ap_paterno', 'like', '%' . $this->search . '%')
            ->orWhere('usuarios.ap_materno', 'like', '%' . $this->search . '%')
            ->orderBy('pacientes.id', 'DESC')
            ->get();
    }

    public function render()
    {
        return view('livewire.tablas.tb-pacientes', [
            'pacientes' => $this->pacientes
        ]);
    }

    public function order($sort, $tab = true)
    {

        $this->search = Str::lower($this->search);
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        if ($tab) {
            $this->pacientes = Paciente::select('usuarios.id as usuario_id', 'pacientes.id as paciente_id', 'usuarios.nombre', 'usuarios.ap_paterno', 'usuarios.ap_materno', 'usuarios.correo', 'usuarios.carnet', 'usuarios.estado_usuario', 'usuarios.telefono', 'pacientes.telefono_emergencia')
                ->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
                ->where('usuarios.nombre', 'like', '%' . $this->search . '%')
                ->orWhere('usuarios.ap_paterno', 'like', '%' . $this->search . '%')
                ->orWhere('usuarios.ap_materno', 'like', '%' . $this->search . '%')
                ->orderBy('usuarios.' . $this->sort, $this->direction)
                ->get();
        } else {
            $this->updatePacientes();
        }
    }
}
