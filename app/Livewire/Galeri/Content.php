<?php

namespace App\Livewire\Galeri;

use App\Models\Galeri;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;

    public $selectedGaleri = null;
    public $initialLoad = true;

    public function mount($selectedGaleri = null)
    {
        if ($selectedGaleri) {
            $this->selectedGaleri = $selectedGaleri;
            $this->initialLoad = true;
        } else {
            $this->initialLoad = false;
        }
    }

    public function showGaleri($id)
    {
        $galeriItem = Galeri::find($id);
        if ($galeriItem) {
            $this->selectedGaleri = $galeriItem;
            $this->dispatch('update-url', route('galeri.show', ['id' => $id]));
        } else {
            $this->closeModal();
        }
    }

    public function closeModal()
    {
        $this->selectedGaleri = null;
        $this->dispatch('update-url', route('galeri.index'));
    }

    public function render()
    {
        $galeri = Galeri::where('status', 1)->latest()->paginate(12);

        return view('livewire.galeri.content', [
            'galeri' => $galeri,
            'galeriCountWithPublic' => $galeri->total(),
        ]);
    }
}
