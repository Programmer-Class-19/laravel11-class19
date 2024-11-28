<?php

namespace App\Livewire;

use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        $type_menu = 'dashboard';
        return view('livewire.beranda', compact('type_menu'));
    }
}
