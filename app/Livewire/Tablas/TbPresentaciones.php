<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Presentacion;

class TbPresentaciones extends Component
{
    public $presentaciones;

    public $search = '';

    public $sort = 'id';

    public $direction = 'desc';

    public function mount()
    {
        $this->updatePresentaciones();
    }

    public function updatedSearch()
    {
        $this->updatePresentaciones();
    }

    public function updatePresentaciones()
    {
        $this->presentaciones = Presentacion::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();
    }

    public function render()
    {
        return view('livewire.tablas.tb-presentaciones', [
            'presentaciones' => $this->presentaciones
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
            $this->presentaciones = Presentacion::where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->get();
        } else {
            $this->updatePresentaciones();
        }
    }
}
