<?php

namespace App\Livewire\Galeri;

use App\Models\Galeri;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.galeri.content', ['galeri' => Galeri::latest()->paginate(12)]);
    }
}
