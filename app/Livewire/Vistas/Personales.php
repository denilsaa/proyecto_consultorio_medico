<?php

namespace App\Livewire\Vistas;

use App\Models\Paciente;
use Livewire\WithPagination;
use App\Models\Personal;
use App\Models\Usuario;
use Livewire\Component;
use Illuminate\Support\Str;

class Personales extends Component
{
    use WithPagination;
    public $open = false;
    public $open_edit = false;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cabeceras = [
        'Nombre',
        'Carnet',
        'Telefono',
        'fecha contrato',
        'turno',
        'cargo',
        'Estado',
        ''
    ];
    public $personales;
    public $nombre, $ap_paterno, $ap_materno, $correo, $telefono, $carnet, $fecha_contrato, $turno, $cargo;

    public function mount()
    {
        $this->updatePersonales();
    }

    public function updatedSearch()
    {
        $this->updatePersonales();
    }

    public function updatedOpen()
    {
        $this->updatePersonales();
    }

    public function render()
    {
        return view('livewire.vistas.personales', [
            'personales' => $this->personales
        ]);
    }

    private function updatePersonales()
    {
        $this->personales = $this->queryPersonals();
    }

    public function order($sort)
    {
        $validColumns = ['id', 'usuario_id', 'telefono_emergencia', 'fecha_contrato', 'turno', 'cargo'];
        $userColumns = ['nombre', 'ap_paterno', 'ap_materno', 'carnet'];

        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        if (in_array($sort, $validColumns) || in_array($sort, $userColumns)) {
            $this->updatePersonales();
        } else {
            // Manejar el caso de una columna no válida
            $this->sort = 'id';
            $this->direction = 'desc';
            $this->updatePersonales();
        }
    }

    private function queryPersonals()
    {
        $search = Str::lower($this->search);
        $query = Personal::query()->with('usuario')
            ->whereHas('usuario', function ($query) use ($search) {
                $query->where('nombre', 'like', '%' . $search . '%')
                    ->orWhere('ap_paterno', 'like', '%' . $search . '%')
                    ->orWhere('ap_materno', 'like', '%' . $search . '%');
            });

        if (in_array($this->sort, ['nombre', 'ap_paterno', 'ap_materno', 'carnet'])) {
            $query->join('usuarios', 'personals.usuario_id', '=', 'usuarios.id')
                ->orderBy('usuarios.' . $this->sort, $this->direction);
        } else {
            $query->orderBy('personals.' . $this->sort, $this->direction);
        }
        return $query->paginate(10, [
            'personals.id as personal_id',
            'personals.usuario_id',
            'personals.fecha_contrato',
            'personals.turno',
            'personals.cargo'
        ]);
    }

    public function save()
    {
        $password = substr($this->nombre, 0, 1) . substr($this->ap_paterno, 0, 1) . substr($this->ap_materno, 0, 1) . substr($this->carnet, -4);

        $this->newPersonal();

        $this->reset([
            'open',
            'nombre',
            'ap_paterno',
            'ap_materno',
            'correo',
            'telefono',
            'carnet',
            'fecha_contrato',
            'turno',
            'cargo'
        ]);

        $this->dispatch('new_per', message: 'Personal creado con éxito', pass: $password);

        $this->updatePersonales();
    }

    private function newPersonal()
    {
        $usuario = Usuario::create([
            'nombre' => $this->nombre,
            'ap_paterno' => $this->ap_paterno,
            'ap_materno' => $this->ap_materno,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'carnet' => $this->carnet,
            'password' => bcrypt(substr($this->nombre, 0, 1) . substr($this->ap_paterno, 0, 1) . substr($this->ap_materno, 0, 1) . substr($this->carnet, -4))
        ]);

        Personal::create([
            'usuario_id' => $usuario->id,
            'fecha_contrato' => $this->fecha_contrato,
            'turno' => $this->turno,
            'cargo' => $this->cargo
        ]);
    }
}
