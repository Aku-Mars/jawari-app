<?php

namespace Tests\Feature;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArtikelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_delete_artikel()
    {
        // Create a user and an article
        $user = User::factory()->create();
        $artikel = Artikel::factory()->create(['user_id' => $user->id]);

        // Acting as the created user
        $this->actingAs($user);

        // Call the destroy method
        $response = $this->delete(route('artikel.destroy', $artikel));

        // Assert the article was deleted from the database
        $this->assertDatabaseMissing('artikel', ['id' => $artikel->id]);

        // Assert the response redirects to the index page with a success message
        $response->assertRedirect(route('artikel.index'));
        $response->assertSessionHas('success', 'Artikel berhasil dihapus');
    }

    public function test_user_can_delete_artikel_with_file()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('artikel.jpg');
        $path = $file->store('uploads/artikel', 'public');

        $artikel = Artikel::factory()->create([
            'user_id' => $user->id,
            'file_path' => $path,
        ]);

        $this->actingAs($user);

        $response = $this->delete(route('artikel.destroy', $artikel));

        $this->assertDatabaseMissing('artikel', ['id' => $artikel->id]);
        Storage::disk('public')->assertMissing($path);

        $response->assertRedirect(route('artikel.index'));
        $response->assertSessionHas('success', 'Artikel berhasil dihapus');
    }
}
