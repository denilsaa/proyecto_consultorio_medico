<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePersonal extends Component
{
    public $open = false;
    public function render()
    {
        return view('livewire.create-personal');
    }
}
