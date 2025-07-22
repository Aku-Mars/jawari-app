<?php

namespace App\Livewire\Artikel;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Artikel;

class ContentArtikel extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.artikel.content-artikel', [
            'artikels' => Artikel::latest()->paginate(12),
        ]);
    }
}
