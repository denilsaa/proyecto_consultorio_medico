<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Farmaco;

class TbFarmacos extends Component
{
    public $farmacos;

    public $search = '';

    public $sort = 'id';

    public $direction = 'desc';

    public function mount()
    {
        $this->updateFarmacos();
    }

    public function updatedSearch()
    {
        $this->updateFarmacos();
    }

    public function updateFarmacos()
    {
        $farmacos = Farmaco::with('presentaciones')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get()
            ->flatMap(function ($farmaco) {
                return $farmaco->presentaciones->map(function ($presentacion) use ($farmaco) {
                    return [
                        'nombre' => $farmaco->nombre,
                        'cantidad' => $farmaco->cantidad,
                        'fecha_vencimiento' => $farmaco->fecha_vencimiento,
                        'presentacion' => $presentacion->nombre
                    ];
                });
            });

        $this->farmacos = $farmacos;
    }

    public function render()
    {
        return view('livewire.tablas.tb-farmacos', [
            'farmacos' => $this->farmacos
        ]);
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        $this->updateFarmacos();
    }
}
