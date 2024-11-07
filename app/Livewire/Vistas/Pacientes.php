<?php

namespace App\Livewire\Vistas;

use Livewire\WithPagination;
use App\Models\Paciente;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

class Pacientes extends Component
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
        'Telefono de emergencia',
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
    #[Validate('required|numeric|digits:8')]
    public $telefono_emergencia;

    public function render()
    {
        $pacientes = $this->queryPacientes();
        $this->resetPage();
        return view('livewire.vistas.pacientes', [
            'pacientes' => $pacientes
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
            $this->render();
        } else {
            $this->sort = 'id';
            $this->direction = 'desc';
            $this->render();
        }
    }

    private function queryPacientes()
    {
        $search = Str::lower($this->search);
        $query = Paciente::with('usuario')
            ->whereHas('usuario', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nombre', 'like', '%' . $search . '%')
                        ->orWhere('carnet', 'like', '%' . $search . '%')
                        ->orWhere('ap_paterno', 'like', '%' . $search . '%')
                        ->orWhere('ap_materno', 'like', '%' . $search . '%');
                })->where('estado_usuario', $this->estado);
            });

        if (in_array($this->sort, ['nombre', 'ap_paterno', 'ap_materno', 'carnet'])) {
            $query->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
                ->orderBy('usuarios.' . $this->sort, $this->direction);
        } else {
            $query->orderBy('pacientes.' . $this->sort, $this->direction);
        }

        return $query->paginate($this->cant);
    }

    public function save()
    {
        $password = $this->generatePassword();

        $this->newPaciente();

        $this->resetForm();

        $this->dispatch('new_per', message: 'Paciente creado con éxito', pass: $password);
    }

    private function generatePassword()
    {
        return substr($this->nombre, 0, 1) . substr($this->ap_paterno, 0, 1) . substr($this->ap_materno, 0, 1) . substr($this->carnet, -4);
    }

    private function newPaciente()
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

        Paciente::create([
            'usuario_id' => $usuario->id,
            'telefono_emergencia' => $this->telefono_emergencia,
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
        $paciente = Paciente::find($this->id);
        $usuario = Usuario::find($paciente->usuario_id);

        $this->nombre = $usuario->nombre;
        $this->ap_paterno = $usuario->ap_paterno;
        $this->ap_materno = $usuario->ap_materno;
        $this->correo = $usuario->correo;
        $this->telefono = $usuario->telefono;
        $this->carnet = $usuario->carnet;
        $this->telefono_emergencia = $paciente->telefono_emergencia;
    }

    public function update()
    {
        $this->editPaciente();

        $this->resetForm();

        $this->dispatch('new_per', message: 'Paciente actualizado con éxito');
    }

    private function editPaciente()
    {
        $usuario = Usuario::find(Paciente::find($this->id)->usuario_id);

        $usuario->update([
            'nombre' => $this->nombre,
            'ap_paterno' => $this->ap_paterno,
            'ap_materno' => $this->ap_materno,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'carnet' => $this->carnet
        ]);

        Paciente::find($this->id)->update([
            'telefono_emergencia' => $this->telefono_emergencia,
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
        $this->dispatch('delete', message: 'Paciente eliminado con éxito');
        $paciente = Paciente::find($id);
        Usuario::find($paciente->usuario_id)->update(['estado_usuario' => $estado]);
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
            'telefono_emergencia'
        ]);
    }
}
