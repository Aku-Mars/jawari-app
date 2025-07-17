<?php

namespace App\Livewire\Galeri;

use App\Models\Galeri;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;

    public $selectedGaleri = null;

    public function showGaleri($id)
    {
        $this->selectedGaleri = Galeri::findOrFail($id);
        $this->dispatchBrowserEvent('update-url', [
            'url' => url("/galeri/{$id}")
        ]);
    }

    public function closeModal()
    {
        $this->selectedGaleri = null;
        $this->dispatchBrowserEvent('update-url', [
            'url' => route('galeri.index'),
        ]);
    }

    public function render()
    {
        $galeri = Galeri::where('status', 1)->latest()->paginate(12);

        return view('livewire.galeri.content', [
            'galeri' => $galeri,
            'galeriCountWithPublic' => $galeri->total()
        ]);
    }
}
