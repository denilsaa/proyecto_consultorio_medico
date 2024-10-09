<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Receta;

class TbRecetas extends Component
{
    public $recetas;

    public $search = '';

    public $sort = 'id';

    public $direction = 'desc';

    public function mount()
    {
        $this->updateRecetas();
    }

    public function updatedSearch()
    {
        $this->updateRecetas();
    }

    public function updateRecetas()
    {
        $this->recetas = Receta::select(
            'usuarios.nombre as paciente',
            'usuarios.telefono',
            'farmacos.nombre as medicamento',
            'recetas.indicaciones',
            'recetas.cantidad',
            'recetas.created_at as fecha'
        )
            ->join('farmacos', 'farmacos.id', '=', 'recetas.farmaco_id')
            ->join('historials', 'historials.id', '=', 'recetas.historial_id')
            ->join('pacientes', 'pacientes.id', '=', 'historials.paciente_id')
            ->join('usuarios', 'usuarios.id', '=', 'pacientes.usuario_id')
            ->where('usuarios.nombre', 'like', '%' . $this->search . '%')
            ->orWhere('usuarios.ap_paterno', 'like', '%' . $this->search . '%')
            ->orWhere('usuarios.ap_materno', 'like', '%' . $this->search . '%')
            ->orderBy('recetas.' . $this->sort, $this->direction)
            ->get();
    }

    public function render()
    {
        return view('livewire.tablas.tb-recetas', [
            'recetas' => $this->recetas
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
            $this->recetas = Receta::select(
                'usuarios.nombre as paciente',
                'usuarios.telefono',
                'farmacos.nombre as medicamento',
                'recetas.indicaciones',
                'recetas.cantidad',
                'recetas.created_at as fecha'
            )
                ->join('farmacos', 'farmacos.id', '=', 'recetas.farmaco_id')
                ->join('historials', 'historials.id', '=', 'recetas.historial_id')
                ->join('pacientes', 'pacientes.id', '=', 'historials.paciente_id')
                ->join('usuarios', 'usuarios.id', '=', 'pacientes.usuario_id')
                ->where('usuarios.nombre', 'like', '%' . $this->search . '%')
                ->orWhere('usuarios.ap_paterno', 'like', '%' . $this->search . '%')
                ->orWhere('usuarios.ap_materno', 'like', '%' . $this->search . '%')
                ->orderBy('recetas.' . $this->sort, $this->direction)
                ->get();
        } else {
            $this->updateRecetas();
        }
    }
}
