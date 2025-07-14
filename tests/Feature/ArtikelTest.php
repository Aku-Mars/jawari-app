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

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    public function test_user_can_view_artikel_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('artikel.index'));

        $response->assertStatus(200);
        $response->assertViewIs('artikel.index');
    }

    public function test_user_can_view_artikel_show()
    {
        $user = User::factory()->create();
        $artikel = Artikel::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->get(route('artikel.show', $artikel));

        $response->assertStatus(200);
        $response->assertViewIs('artikel.show');
    }

    public function test_user_can_create_artikel()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('artikel.jpg');

        $artikelData = [
            'judul' => 'Judul Artikel Baru',
            'penulis' => 'Penulis Baru',
            'views' => 10,
            'file_path' => $file,
            'link_youtube' => 'https://www.youtube.com/watch?v=example',
            'deskripsi' => 'Deskripsi artikel baru.',
        ];

        $response = $this->post(route('artikel.store'), $artikelData);

        $this->assertDatabaseHas('artikel', [
            'judul' => 'Judul Artikel Baru',
            'penulis' => 'Penulis Baru',
        ]);

        $response->assertRedirect(route('artikel.index'));
        $response->assertSessionHas('success', 'Artikel berhasil ditambahkan.');
    }

    public function test_user_can_update_artikel()
    {
        $user = User::factory()->create();
        $artikel = Artikel::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $updatedData = [
            'judul' => 'Judul Artikel Diperbarui',
            'penulis' => 'Penulis Diperbarui',
            'views' => 20,
            'deskripsi' => 'Deskripsi artikel diperbarui.',
        ];

        $response = $this->put(route('artikel.update', $artikel), $updatedData);

        $this->assertDatabaseHas('artikel', [
            'id' => $artikel->id,
            'judul' => 'Judul Artikel Diperbarui',
        ]);

        $response->assertRedirect(route('artikel.index'));
        $response->assertSessionHas('success', 'Artikel berhasil diupdate');
    }

    public function test_validation_fails_on_create_artikel_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invalidData = [
            'judul' => '', // Judul kosong
            'penulis' => 'Penulis',
            'views' => 10,
            'deskripsi' => 'Deskripsi',
        ];

        $response = $this->post(route('artikel.store'), $invalidData);

        $response->assertSessionHasErrors('judul');
    }

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

    public function test_unauthorized_user_cannot_delete_artikel()
    {
        // Create two separate users
        $owner = User::factory()->create();
        $anotherUser = User::factory()->create();

        // Create an article owned by the first user
        $artikel = Artikel::factory()->create(['user_id' => $owner->id]);

        // Act as the second user
        $this->actingAs($anotherUser);

        // Attempt to delete the article owned by the first user
        $response = $this->delete(route('artikel.destroy', $artikel));

        // Assert that the action is forbidden
        $response->assertStatus(403);

        // Assert that the article was NOT deleted from the database
        $this->assertDatabaseHas('artikel', ['id' => $artikel->id]);
    }
}
