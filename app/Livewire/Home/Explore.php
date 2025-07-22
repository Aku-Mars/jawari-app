<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Explore extends Component
{

    public string $slug = 'kesenian/sejarah-tari-banten';
    public function render()
    {
        return view('livewire.home.explore', [
            'slug' => $this->slug,
        ]);
    }
}
