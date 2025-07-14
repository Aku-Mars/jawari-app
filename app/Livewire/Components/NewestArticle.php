<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NewestArticle extends Component
{
    public function render()
    {

        $articles = collect([
            [
                'title' => 'Festival Tari Banten 2025 Resmi Dibuka di Serang',
                'date' => '20 Maret 2026',
                'thumbnail' => asset('assets/temp/temp_article1.jpg'),
            ],
            [
                'title' => 'Tari Walijamaliha Jadi Sorotan dalam Acara Penyambutan Delegasi Wisata Budaya …',
                'date' => '20 Maret 2026',
                'thumbnail' => asset('assets/temp/temp_article1.jpg'),
            ],
            [
                'title' => 'Kolaborasi Beberapa Sanggar Tari Banten dan Seniman Nasional',
                'date' => '20 Maret 2026',
                'thumbnail' => asset('assets/temp/temp_article1.jpg'),

            ],
            [
                'title' => 'Sanggar Seni Banten Tampilkan Tari Topeng dalam Festival Budaya Nusantara',
                'date' => '20 Maret 2026',
                'thumbnail' => asset('assets/temp/temp_article1.jpg'),
            ],
            [
                'title' => 'Wisatawan Antusias Ikuti Workshop Tari Tradisional di Desa Wisata Cikolelet',
                'date' => '20 Maret 2026',
                'thumbnail' => asset('assets/temp/temp_article1.jpg'),
            ],
        ]);
        return view('livewire.components.newest-article', ['articles' => $articles]);
    }
}
