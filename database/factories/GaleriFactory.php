<?php

namespace Database\Factories;

use App\Models\Galeri;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    protected $model = Galeri::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::where('email', 'admin@serangkab.go.id')->first()->id,
            'file_path' => $this->faker->imageUrl(),
            'deskripsi' => $this->faker->paragraph,
            'status' => $this->faker->boolean,
        ];
    }
}
