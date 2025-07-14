<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Navbar extends Component
{
    public $activeLink = 'Beranda';

    public function setActiveLink($activeLink = 'Beranda')
    {
        $this->activeLink = $activeLink;
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
