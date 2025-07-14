<?php

namespace App\Livewire\Home;

use App\Models\Artikel;
use Livewire\Component;

class Article extends Component
{
    public $articles;

    public function mount()
    {
        $this->articles = Artikel::latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.home.article');
    }
}
