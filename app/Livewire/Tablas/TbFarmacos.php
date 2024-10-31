<?php

namespace App\Livewire\Tablas;

use Livewire\Component;
use App\Models\Farmaco;
use App\Models\PresentacionFarmaco;
use Illuminate\Support\Str;

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
        $farmacos = $this->queryFarmacos();

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
    private function queryFarmacos()
    {
        $search = Str::lower($this->search);
        $query = PresentacionFarmaco::with(['farmaco', 'presentacion'])
            ->whereHas('farmaco', function ($query) use ($search) {
                $query->whereRaw('LOWER(nombre) LIKE ?', ['%' . $search . '%']);
            });

        $query->orderBy($this->sort, $this->direction);

        return $query->get()->map(function ($presentacionFarmaco) {
            return [
                'nombre' => $presentacionFarmaco->farmaco->nombre,
                'cantidad' => $presentacionFarmaco->cantidad,
                'fecha_vencimiento' => $presentacionFarmaco->fecha_vencimiento,
                'presentacion' => $presentacionFarmaco->presentacion->nombre
            ];
        });
    }
}
