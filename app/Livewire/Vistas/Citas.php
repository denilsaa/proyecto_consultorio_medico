<?php

namespace App\Livewire\Vistas;

use App\Models\Cita;
use Livewire\WithPagination;
use App\Models\Paciente;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

class Citas extends Component
{
    use WithPagination;

    public $open = false;
    public $open_edit = false;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;
    public $estado = true;
    public $cita_id;
    public $cabeceras = [
        'Paciente',
        'Carnet',
        'Telefono',
        'Fecha',
        'Doctor',
        'Estado',
        ''
    ];

    /* Campos del formulario */
    #[Validate('required|max:20|min:3|regex:/^[^\s].*$/')]
    public $nombre_paciente;
    #[Validate('required|max:20|min:3')]
    public $ap_paterno_paciente;
    #[Validate('required|max:20|min:3')]
    public $ap_materno_paciente;
    #[Validate('required|email|unique:usuarios')]
    public $correo_paciente;
    #[Validate('required|numeric|digits:8')]
    public $telefono_paciente;
    #[Validate('required|max:10|min:7')]
    public $carnet_paciente;
    #[Validate('required|date')]
    public $fecha_cita;
    #[Validate('required')]
    public $paciente_id;

    public function render()
    {
        $citas = $this->queryCitas();
        $pacientes = $this->searchPaciente();
        //      dd($citas);
        //     dd($this->searchPaciente());
        $this->resetPage();
        return view('livewire.vistas.citas', [
            'citas' => $citas,
            'pacientes' => $pacientes
        ]);
    }

    public function searchPaciente()
    {
        if ($this->carnet_paciente == '') {
            return null;
        }
        return Paciente::with('usuario')
            ->whereHas('usuario', function ($query) {
                $query->where(function ($query) {
                    $query->Where('carnet', 'like', $this->carnet_paciente . '%');
                })->where('estado_usuario', $this->estado);
            })->get();
    }

    public function order($sort)
    {
        $validColumns = ['id', 'paciente_id', 'telefono', 'fecha', 'doctor_id', 'confirmada'];
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

    private function queryCitas()
    {
        $query = Cita::select(
            'usuarios_paciente.nombre as paciente',
            'usuarios_paciente.carnet',
            'usuarios_paciente.telefono',
            'citas.fecha',
            'usuarios_doctor.nombre as doctor',
            'citas.confirmada'
        )
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->join('usuarios as usuarios_paciente', 'usuarios_paciente.id', '=', 'pacientes.usuario_id')
            ->join('personals', 'personals.id', '=', 'citas.personal_id')
            ->join('usuarios as usuarios_doctor', 'usuarios_doctor.id', '=', 'personals.usuario_id')
            ->where(function ($query) {
                $query->where('usuarios_paciente.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('usuarios_paciente.ap_paterno', 'like', '%' . $this->search . '%')
                    ->orWhere('usuarios_paciente.ap_materno', 'like', '%' . $this->search . '%');
            })
            ->orderBy('citas.' . $this->sort, $this->direction);

        return $query->paginate($this->cant);
    }

    public function save()
    {
        $this->newCita();

        $this->resetForm();

        $this->dispatch('new_cita', message: 'Cita creada con éxito');
    }

    private function newCita()
    {
        $paciente = Usuario::create([
            'nombre' => $this->nombre_paciente,
            'ap_paterno' => $this->ap_paterno_paciente,
            'ap_materno' => $this->ap_materno_paciente,
            'correo' => $this->correo_paciente,
            'telefono' => $this->telefono_paciente,
            'carnet' => $this->carnet_paciente,
            'password' => bcrypt(Str::random(8))
        ]);

        $paciente = Paciente::create([
            'usuario_id' => $paciente->id
        ]);

        Cita::create([
            'paciente_id' => $paciente->id,
            'fecha' => $this->fecha_cita,
            'personal_id' => $this->doctor_id,
            'confirmada' => false
        ]);
    }

    public function edit_open($id)
    {
        $this->cita_id = $id;
        $this->open_edit = true;
        $this->buscar();
    }

    private function buscar()
    {
        $cita = Cita::find($this->cita_id);
        $paciente = Paciente::find($cita->paciente_id);
        $usuario = Usuario::find($paciente->usuario_id);

        $this->nombre_paciente = $usuario->nombre;
        $this->ap_paterno_paciente = $usuario->ap_paterno;
        $this->ap_materno_paciente = $usuario->ap_materno;
        $this->correo_paciente = $usuario->correo;
        $this->telefono_paciente = $usuario->telefono;
        $this->carnet_paciente = $usuario->carnet;
        $this->fecha_cita = $cita->fecha;
    }

    public function update()
    {
        $this->editCita();

        $this->resetForm();

        $this->dispatch('update_cita', message: 'Cita actualizada con éxito');
    }

    private function editCita()
    {
        $cita = Cita::find($this->cita_id);
        $paciente = Paciente::find($cita->paciente_id);
        $usuario = Usuario::find($paciente->usuario_id);

        $usuario->update([
            'nombre' => $this->nombre_paciente,
            'ap_paterno' => $this->ap_paterno_paciente,
            'ap_materno' => $this->ap_materno_paciente,
            'correo' => $this->correo_paciente,
            'telefono' => $this->telefono_paciente,
            'carnet' => $this->carnet_paciente
        ]);

        $cita->update([
            'fecha' => $this->fecha_cita,
            'personal_id' => $this->doctor_id,
            'confirmada' => $cita->confirmada
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
        $cita = Cita::find($id);
        $paciente = Paciente::find($cita->paciente_id);
        $usuario = Usuario::find($paciente->usuario_id);

        if ($estado) {
            $this->dispatch(event: 'restore', message: 'Cita de ' . $usuario->nombre . ' restaurada con éxito');
        } else {
            $this->dispatch(event: 'delete', message: 'Cita de ' . $usuario->nombre . ' eliminada con éxito');
        }

        $cita->update(['confirmada' => $estado]);
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'open_edit',
            'nombre_paciente',
            'ap_paterno_paciente',
            'ap_materno_paciente',
            'correo_paciente',
            'telefono_paciente',
            'carnet_paciente',
            'fecha_cita',
            'doctor_id'
        ]);
    }

    public function seleccionar($id, $nombre, $carnet)
    {
        $this->paciente_id = $id;
        $this->nombre_paciente = $nombre;
        $this->carnet_paciente = null;
    }
}
