<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    protected $model = Artikel::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::where('email', 'admin@serangkab.go.id')->first()->id,
            'judul' => $this->faker->sentence,
            'penulis' => $this->faker->name,
            'views' => $this->faker->numberBetween(0, 1000),
            'file_path' => null,
            'link_youtube' => null,
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
