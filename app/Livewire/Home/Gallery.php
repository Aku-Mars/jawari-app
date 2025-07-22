<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\Galeri;

class Gallery extends Component
{


    public function render()
    {
        $galeri = Galeri::where('status', 1)->latest()->take(10)->get();
        return view('livewire.home.gallery', ['galeri' => $galeri]);
    }
}
