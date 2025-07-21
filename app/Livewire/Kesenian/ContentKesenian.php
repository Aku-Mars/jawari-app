<?php

namespace App\Livewire\Kesenian;

use Livewire\Component;

class ContentKesenian extends Component
{
    public $judul;
    public $sub_judul;
    public $deskripsi;
    public $link_youtube;

    public function mount($judul, $sub_judul, $deskripsi, $link_youtube)
    {
        $this->judul = $judul;
        $this->sub_judul = $sub_judul;
        $this->deskripsi = $deskripsi;
        $this->link_youtube = $link_youtube;
    }

    public function render()
    {
        return view('livewire.kesenian.content-kesenian');
    }
}
