<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Artikel;

class NewestArticle extends Component
{
    public $articles = [];

    public function mount()
    {
        $this->articles = Artikel::latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.components.newest-article');
    }
}
