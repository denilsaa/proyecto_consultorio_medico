<?php

namespace App\Livewire;

use App\Livewire\Vistas\Citas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCitas extends Component
{
    public $open = false;

    public function render()
    {
        $citas = $this->citas();
        return view('livewire.show-citas', compact('citas'));
    }
    public function citas()
    {
        return Auth::user()->pacientes->first()->citas;
    }
}
