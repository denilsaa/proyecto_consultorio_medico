<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Paciente;

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
        $this->pacientes = Paciente::with('usuario')
            ->whereHas('usuario', function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('ap_paterno', 'like', '%' . $this->search . '%')
                    ->orWhere('ap_materno', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort, $this->direction)
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
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        if ($tab) {
            $this->pacientes = Paciente::with('usuario')
                ->whereHas('usuario', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('ap_paterno', 'like', '%' . $this->search . '%')
                        ->orWhere('ap_materno', 'like', '%' . $this->search . '%');
                })
                ->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
                ->orderBy('usuarios.' . $this->sort, $this->direction)
                ->select('pacientes.*')
                ->get();
        } else {
            $this->updatePacientes();
        }
    }
}
