<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Cita;

class TbCitas extends Component
{
    public $citas;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public function mount()
    {
        $this->updateCitas();
    }

    public function updatedSearch()
    {
        $this->updateCitas();
    }

    public function updateCitas()
    {
        $this->citas = Cita::select(
            'usuarios_paciente.nombre as nombre_paciente',
            'usuarios_paciente.carnet',
            'usuarios_paciente.telefono',
            'citas.fecha',
            'usuarios_doctor.nombre as doctor',
            'citas.confirmada'
        )
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->join('usuarios as usuarios_paciente', 'usuarios_paciente.id', '=', 'pacientes.usuario_id')
            ->join('personals', 'personals.id', '=', 'citas.personal_id')
            ->join('usuarios as usuarios_doctor', 'usuarios_doctor.id', '=', 'personals.usuario_id')
            ->where(function ($query) {
                $query->where('usuarios_paciente.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('usuarios_paciente.ap_paterno', 'like', '%' . $this->search . '%')
                    ->orWhere('usuarios_paciente.ap_materno', 'like', '%' . $this->search . '%');
            })
            ->orderBy('citas.' . $this->sort, $this->direction) // Especifica la tabla para la columna id
            ->get();
    }

    public function render()
    {
        return view('livewire.tablas.tb-citas', [
            'citas' => $this->citas
        ]);
    }

    public function order($sort, $tab = true)
    {
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        if ($tab) {
            $this->citas = Cita::select(
                'usuarios_paciente.nombre as nombre_paciente',
                'usuarios_paciente.carnet',
                'usuarios_paciente.telefono',
                'citas.fecha',
                'usuarios_doctor.nombre as doctor',
                'citas.confirmada'
            )
                ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
                ->join('usuarios as usuarios_paciente', 'usuarios_paciente.id', '=', 'pacientes.usuario_id')
                ->join('personals', 'personals.id', '=', 'citas.personal_id')
                ->join('usuarios as usuarios_doctor', 'usuarios_doctor.id', '=', 'personals.usuario_id')
                ->where(function ($query) {
                    $query->where('usuarios_paciente.nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('usuarios_paciente.ap_paterno', 'like', '%' . $this->search . '%')
                        ->orWhere('usuarios_paciente.ap_materno', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->get();
        } else {
            $this->updateCitas();
        }
    }
}
