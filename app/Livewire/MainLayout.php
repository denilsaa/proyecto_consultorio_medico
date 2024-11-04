<?php

namespace App\Livewire;

use Livewire\Component;

class MainLayout extends Component
{
    public $view = 'personales';

    protected $listeners = ['changeView'];

    public function changeView($view)
    {
        $this->view = $view;
    }

    public function render()
    {
        return view('livewire.main-layout');
    }
}
