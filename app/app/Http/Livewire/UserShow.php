<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserShow extends Component
{
    public $param;

    public function mount($param = null)
    {
        $this->param = $param;
    }

    public function render()
    {
        return view('livewire.user-show')
            ->extends("layouts.app");
    }
}
