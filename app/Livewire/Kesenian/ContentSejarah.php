<?php

namespace App\Livewire\Kesenian;

use Livewire\Component;

class ContentSejarah extends Component
{
    public $html;
    public $slug;

    public function mount($html, $slug)
    {
        // dd($html, $slug);
        $this->html = $html;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.kesenian.content-sejarah');
    }
}
