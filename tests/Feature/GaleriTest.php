<?php

namespace Tests\Feature;

use App\Models\Galeri;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GaleriTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    public function test_user_can_view_galeri_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('galeri.index'));

        $response->assertStatus(200);
        $response->assertViewIs('galeri.index');
    }

    public function test_user_can_view_galeri_show()
    {
        $user = User::factory()->create();
        $galeri = Galeri::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->get(route('galeri.show', $galeri));

        $response->assertStatus(200);
        $response->assertViewIs('galeri.show');
    }

    public function test_user_can_create_galeri()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('galeri.jpg');

        $galeriData = [
            'file_path' => $file,
            'deskripsi' => 'Deskripsi galeri baru.',
            'status'    => true,
        ];

        $response = $this->post(route('galeri.store'), $galeriData);

        $this->assertDatabaseHas('galeri', [
            'deskripsi' => 'Deskripsi galeri baru.',
        ]);

        $response->assertRedirect(route('galeri.index'));
        $response->assertSessionHas('success', 'Galeri berhasil dibuat');
    }

    public function test_user_can_update_galeri()
    {
        $user = User::factory()->create();
        $galeri = Galeri::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $updatedData = [
            'deskripsi' => 'Deskripsi galeri diperbarui.',
            'status'    => false,
        ];

        $response = $this->put(route('galeri.update', $galeri), $updatedData);

        $this->assertDatabaseHas('galeri', [
            'id' => $galeri->id,
            'deskripsi' => 'Deskripsi galeri diperbarui.',
        ]);

        $response->assertRedirect(route('galeri.index'));
        $response->assertSessionHas('success', 'Galeri berhasil diupdate');
    }

    public function test_validation_fails_on_create_galeri_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invalidData = [
            'file_path' => '', // file_path kosong
            'deskripsi' => 'Deskripsi',
            'status'    => true,
        ];

        $response = $this->post(route('galeri.store'), $invalidData);

        $response->assertSessionHasErrors('file_path');
    }

    public function test_user_can_delete_galeri()
    {
        $user = User::factory()->create();
        $galeri = Galeri::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->delete(route('galeri.destroy', $galeri));

        $this->assertDatabaseMissing('galeri', ['id' => $galeri->id]);

        $response->assertRedirect(route('galeri.index'));
        $response->assertSessionHas('success', 'Galeri berhasil dihapus');
    }

    public function test_unauthorized_user_cannot_delete_galeri()
    {
        $owner = User::factory()->create();
        $anotherUser = User::factory()->create();
        $galeri = Galeri::factory()->create(['user_id' => $owner->id]);

        $this->actingAs($anotherUser);

        $response = $this->delete(route('galeri.destroy', $galeri));

        $response->assertStatus(403);
        $this->assertDatabaseHas('galeri', ['id' => $galeri->id]);
    }
}
