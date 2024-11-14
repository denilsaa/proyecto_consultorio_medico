<?php

namespace App\Livewire\Vistas;

use Livewire\WithPagination;
use App\Models\Farmaco;
use App\Models\PresentacionFarmaco;
use App\Models\Presentacion;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Farmacos extends Component
{
    use WithPagination;

    public $open = false;
    public $open_edit = false;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;
    public $estado = true;
    public $id;
    //public $farmacos;
    public $cabeceras = [
        'Farmaco',
        'Presentacion',
        'Cantidad',
        'fecha vencimiento',
        'Estado',
        ''
    ];
    /* campos form */
    #[Validate('required|max:20|min:3')]
    public $nombre;
    #[Validate('required|numeric|min:1')]
    public $cantidad;
    #[Validate('required|date|date_format:d/m/Y')]
    public $fecha_vencimiento;
    #[Validate('required|max:20|min:3')]
    public $presentacion;

    public function render()
    {
        $farmacos = $this->queryFarmacos();
        $presentaciones = Presentacion::all();
        $this->resetPage();
        return view('livewire.vistas.farmacos', [
            'farmacos' => $farmacos,
            'presentaciones' => $presentaciones
        ]);
    }


    public function order($sort)
    {
        $validColumns = ['id', 'cantidad', 'fecha_vencimiento',];
        $farmacoColumns = ['farmaco'];
        $presentacionColumns = ['presentacion'];

        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        if (in_array($sort, $validColumns) || in_array($sort, $farmacoColumns) || in_array($sort, $presentacionColumns)) {
            $this->render();
        } else {
            // Manejar el caso de una columna no válida
            $this->sort = 'id';
            $this->direction = 'desc';
            $this->render();
        }
    }

    private function queryFarmacos()
    {
        $search = Str::lower($this->search);
        $query = PresentacionFarmaco::with(['farmaco', 'presentacion'])
            ->whereHas('farmaco', function ($query) use ($search) {
                $query->whereRaw('LOWER(nombre) LIKE ?', ['%' . $search . '%']);
            })
            ->whereHas('presentacion', function ($query) {
                // Filtra por el estado de la presentación
                $query->where('estado', $this->estado); 
            });

        if (in_array($this->sort, ['cantidad', 'fecha_vencimiento'])) {
            $query->orderBy($this->sort, $this->direction);
        } elseif ($this->sort == 'farmaco') {
            $query->join('farmacos', 'presentacion_farmaco.farmaco_id', '=', 'farmacos.id')
                ->orderBy('farmacos.nombre', $this->direction);
        } elseif ($this->sort == 'presentacion') {
            $query->join('presentacions', 'presentacion_farmaco.presentacion_id', '=', 'presentacions.id')
                ->orderBy('presentacions.nombre', $this->direction);
        } else {
            $query->orderBy('presentacion_farmaco.id', $this->direction);
        }

        return $query->paginate($this->cant);
    }


    public function save()
    {
        $this->newFarmaco();

        $this->reset([
            'open',
            'nombre',
            'cantidad',
            'fecha_vencimiento',
            'presentacion'
        ]);

        $this->dispatch('new', message: 'Farmaco creado con éxito',);
    }

    private function newFarmaco()
    {
        if (Farmaco::where('nombre', $this->nombre)->exists()) {
            $farmaco = Farmaco::where('nombre', $this->nombre)->first();
        } else {
            $farmaco = Farmaco::create([
                //'personal_id' => Auth::user()-> personal->first()->id,//id de personal
                'personal_id' => Auth::user()->id, //id de usuario
                'nombre' => $this->nombre,
            ]);
        }
        PresentacionFarmaco::create([
            'farmaco_id' => $farmaco->id,
            'presentacion_id' => $this->presentacion,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'cantidad' => $this->cantidad,
        ]);
    }

    public function edit_open($id)
    {
        $this->id = $id;
        $this->open_edit = true;
        $this->buscar();
    }

    private function buscar()
    {
        $farmaco = PresentacionFarmaco::find($this->id);

        $this->nombre = $farmaco->farmaco->nombre;
        $this->cantidad = $farmaco->cantidad;
        $this->fecha_vencimiento = $farmaco->fecha_vencimiento;
        $this->presentacion = $farmaco->presentacion_id;
    }

    public function update()
    {
        $this->editFarmaco();

        $this->reset([
            'open',
            'nombre',
            'cantidad',
            'fecha_vencimiento',
            'presentacion'
        ]);

        $this->dispatch('new', message: 'Farmaco actualizado con éxito');
    }

    private function editFarmaco()
    {
        $farmaco = PresentacionFarmaco::find($this->id);
        if (Farmaco::where('nombre', $this->nombre)->exists()) {
            $id_farmaco = Farmaco::where('nombre', $this->nombre)->first();
        } else {
            $id_farmaco = Farmaco::create([
                'personal_id' => Auth::user()->id,
                'nombre' => $this->nombre,
            ]);
        }

        $farmaco->update([
            'farmaco_id' => $id_farmaco->id,
            'presentacion_id' => $this->presentacion,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'cantidad' => $this->cantidad,
        ]);
    }

    public function close()
    {
        $this->open_edit = false;
        $this->open = false;
    }

    public function new_estado($id, $estado)
    {
        $this->dispatch('delete', massage: 'Farmaco eliminado con éxito');
        $farmaco = Farmaco::find($id);
    }
}
