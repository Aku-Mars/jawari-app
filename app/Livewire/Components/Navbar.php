<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Kesenian;

class Navbar extends Component
{
    public $activeLink = 'Beranda';

    public function setActiveLink($activeLink = 'Beranda')
    {
        $this->activeLink = $activeLink;
    }

    public function render()
    {
        $kesenianSlugList = Kesenian::select('sub_judul', 'judul')
            ->limit(5)
            ->get();
        return view('livewire.components.navbar', [
            'kesenianSlugList' => $kesenianSlugList
        ]);
    }
}
