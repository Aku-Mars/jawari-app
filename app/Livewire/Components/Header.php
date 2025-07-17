<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Header extends Component
{

    public string $title;
    public string $subtitle;
    public string $imgPath;

    public function render()
    {
        return view('livewire.components.header');
    }
}
