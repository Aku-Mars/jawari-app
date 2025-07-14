<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
    public string $label;
    public string $href = "#";
    public string $size = 'md';
    public string $variant = 'primary';
    public string $class = '';

    public function render()
    {
        return view('livewire.components.button');
    }
}
