<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $open = false;
    public function openModal()
    {
        $this->open = true;
    }
    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
