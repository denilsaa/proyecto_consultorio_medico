<?php

namespace App\Livewire\Vistas;

use Livewire\WithPagination;
use App\Models\Personal;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

class Personales extends Component
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
    public $cabeceras = [
        'Nombre',
        'Carnet',
        'Telefono',
        'Fecha Contrato',
        'Turno',
        'Cargo',
        'Estado',
        ''
    ];

    /* Campos del formulario */
    #[Validate('required|max:20|min:3|regex:/^[^\s].*$/')]
    public $nombre;
    #[Validate('required|max:20|min:3')]
    public $ap_paterno;
    #[Validate('required|max:20|min:3')]
    public $ap_materno;
    #[Validate('required|email|unique:usuarios')]
    public $correo;
    #[Validate('required|numeric|digits:8')]
    public $telefono;
    #[Validate('required|max:10|min:7|unique:usuarios')]
    public $carnet;
    #[Validate('required|date_format:d-m-y')]
    public $fecha_contrato;
    #[Validate('required|in:Mañana,Tarde,Noche')]
    public $turno;
    #[Validate('required|in:Doctor,Enfermera,Enfermero,Secretaria')]
    public $cargo;

    public function render()
    {
        $personales = $this->queryPersonals();
        $this->resetPage();
        return view('livewire.vistas.personales', [
            'personales' => $personales
        ]);
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
            $this->render();
        } else {
            $this->sort = 'id';
            $this->direction = 'desc';
            $this->render();
        }
    }

    private function queryPersonals()
    {
        $search = Str::lower($this->search);
        $query = Personal::query()->with('usuario')
            ->whereHas('usuario', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nombre', 'like', '%' . $search . '%')
                        ->orWhere('carnet', 'like', '%' . $search . '%')
                        ->orWhere('ap_paterno', 'like', '%' . $search . '%')
                        ->orWhere('ap_materno', 'like', '%' . $search . '%');
                })->where('estado_usuario', $this->estado);
            });

        if (in_array($this->sort, ['nombre', 'ap_paterno', 'ap_materno', 'carnet'])) {
            $query->join('usuarios', 'personals.usuario_id', '=', 'usuarios.id')
                ->orderBy('usuarios.' . $this->sort, $this->direction);
        } else {
            $query->orderBy('personals.' . $this->sort, $this->direction);
        }

        return $query->paginate($this->cant);
    }

    public function save()
    {
        $password = $this->generatePassword();

        $this->newPersonal();

        $this->resetForm();

        $this->dispatch('new_per', message: 'Personal creado con éxito', pass: $password);
    }

    private function generatePassword()
    {
        return substr($this->nombre, 0, 1) . substr($this->ap_paterno, 0, 1) . substr($this->ap_materno, 0, 1) . substr($this->carnet, -4);
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
            'password' => bcrypt($this->generatePassword())
        ]);

        // Formatear la fecha antes de guardarla
        $fecha_contrato = date('Y-m-d', strtotime($this->fecha_contrato));

        Personal::create([
            'usuario_id' => $usuario->id,
            'fecha_contrato' => $this->fecha_contrato,
            'turno' => $this->turno,
            'cargo' => $this->cargo
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
        $personal = Personal::find($this->id);
        $usuario = Usuario::find($personal->usuario_id);

        $this->nombre = $usuario->nombre;
        $this->ap_paterno = $usuario->ap_paterno;
        $this->ap_materno = $usuario->ap_materno;
        $this->correo = $usuario->correo;
        $this->telefono = $usuario->telefono;
        $this->carnet = $usuario->carnet;
        $this->fecha_contrato = $personal->fecha_contrato;
        $this->turno = $personal->turno;
        $this->cargo = $personal->cargo;
    }

    public function update()
    {
        $this->editPersonal();

        $this->resetForm();

        $this->dispatch('new_per', message: 'Personal actualizado con éxito');
    }

    private function editPersonal()
    {
        $usuario = Usuario::find(Personal::find($this->id)->usuario_id);

        $usuario->update([
            'nombre' => $this->nombre,
            'ap_paterno' => $this->ap_paterno,
            'ap_materno' => $this->ap_materno,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'carnet' => $this->carnet
        ]);

        Personal::find($this->id)->update([
            'fecha_contrato' => $this->fecha_contrato,
            'turno' => $this->turno,
            'cargo' => $this->cargo
        ]);
    }

    public function close()
    {
        $this->open_edit = false;
        $this->open = false;
    }

    public function add_id($id)
    {
        if (isset($this->ids[$id]) && $this->ids[$id] === true) {
            unset($this->ids[$id]);
        } else {
            $this->ids[$id] = true;
        }
    }

    public function new_estado($id, $estado)
    {
        $personal = Personal::find($id);
        $usuario = Usuario::find($personal->usuario_id);

        if ($estado) {
            $this->dispatch(event: 'restore', message: 'Personal ' . $usuario->nombre . ' restaurado con éxito');
        } else {

            $this->dispatch(event: 'delete', message: 'Personal' . $usuario->nombre . 'eliminado con éxito');
        }


        $usuario->update(['estado_usuario' => $estado]);
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'open_edit',
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
    }
}
