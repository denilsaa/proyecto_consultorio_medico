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

    public function render()
    {
        return view('livewire.tablas.tb-pacientes', [
            'pacientes' => $this->pacientes
        ]);
    }

    protected function lista()
    {
        return $this->queryPacientes()->get([
            'pacientes.id as paciente_id',
            'pacientes.usuario_id',
            'pacientes.telefono_emergencia'
        ]);
    }

    public function order($sort)
    {
        $validColumns = ['id', 'usuario_id', 'telefono_emergencia'];
        $userColumns = ['nombre', 'ap_paterno', 'ap_materno', 'carnet'];

        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        if (in_array($sort, $validColumns) || in_array($sort, $userColumns)) {
            $this->updatePacientes();
        } else {
            // Manejar el caso de una columna no válida
            $this->sort = 'id';
            $this->direction = 'desc';
            $this->updatePacientes();
        }
    }

    private function updatePacientes()
    {
        $this->pacientes = $this->lista();
    }

    private function queryPacientes()
    {
        $search = Str::lower($this->search);
        $query = Paciente::with('usuario')
            ->whereHas('usuario', function ($query) use ($search) {
                $query->where('nombre', 'like', '%' . $search . '%')
                    ->orWhere('ap_paterno', 'like', '%' . $search . '%')
                    ->orWhere('ap_materno', 'like', '%' . $search . '%');
            });

        if (in_array($this->sort, ['nombre', 'ap_paterno', 'ap_materno', 'carnet'])) {
            $query->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
                ->orderBy('usuarios.' . $this->sort, $this->direction);
        } else {
            $query->orderBy('pacientes.' . $this->sort, $this->direction);
        }

        return $query;
    }
}
