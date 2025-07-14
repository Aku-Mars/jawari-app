<?php

namespace Database\Factories;

use App\Models\Kesenian;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KesenianFactory extends Factory
{
    protected $model = Kesenian::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'judul' => $this->faker->sentence,
            'sub_judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'banner_image' => $this->faker->imageUrl(),
            'link_youtube' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'file_path' => null,
        ];
    }
}
