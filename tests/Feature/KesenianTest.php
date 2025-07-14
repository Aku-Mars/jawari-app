<?php

namespace Tests\Feature;

use App\Models\Kesenian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KesenianTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    public function test_user_can_view_kesenian_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('kesenian.index'));

        $response->assertStatus(200);
        $response->assertViewIs('kesenian.index');
    }

    public function test_user_can_view_kesenian_show()
    {
        $user = User::factory()->create();
        $kesenian = Kesenian::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->get(route('kesenian.show', $kesenian));

        $response->assertStatus(200);
        $response->assertViewIs('kesenian.show');
    }

    public function test_user_can_create_kesenian()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Storage::fake('public');
        $banner = UploadedFile::fake()->image('banner.jpg');

        $kesenianData = [
            'judul' => 'Judul Kesenian Baru',
            'sub_judul' => 'Sub Judul Baru',
            'deskripsi' => 'Deskripsi kesenian baru.',
            'banner_image' => $banner,
        ];

        $response = $this->post(route('kesenian.store'), $kesenianData);

        $this->assertDatabaseHas('kesenian', [
            'judul' => 'Judul Kesenian Baru',
        ]);

        $response->assertRedirect(route('kesenian.index'));
        $response->assertSessionHas('success', 'Kesenian berhasil ditambahkan');
    }

    public function test_user_can_update_kesenian()
    {
        $user = User::factory()->create();
        $kesenian = Kesenian::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $updatedData = [
            'judul' => 'Judul Kesenian Diperbarui',
            'sub_judul' => 'Sub Judul Diperbarui',
            'deskripsi' => 'Deskripsi kesenian diperbarui.',
        ];

        $response = $this->put(route('kesenian.update', $kesenian), $updatedData);

        $this->assertDatabaseHas('kesenian', [
            'id' => $kesenian->id,
            'judul' => 'Judul Kesenian Diperbarui',
        ]);

        $response->assertRedirect(route('kesenian.index'));
        $response->assertSessionHas('success', 'Kesenian berhasil diperbarui');
    }

    public function test_validation_fails_on_create_kesenian_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invalidData = [
            'judul' => '', // judul kosong
            'sub_judul' => 'Sub Judul',
            'deskripsi' => 'Deskripsi',
            'banner_image' => 'not-an-image',
        ];

        $response = $this->post(route('kesenian.store'), $invalidData);

        $response->assertSessionHasErrors(['judul', 'banner_image']);
    }

    public function test_user_can_delete_kesenian()
    {
        $user = User::factory()->create();
        $kesenian = Kesenian::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->delete(route('kesenian.destroy', $kesenian));

        $this->assertDatabaseMissing('kesenian', ['id' => $kesenian->id]);

        $response->assertRedirect(route('kesenian.index'));
        $response->assertSessionHas('success', 'Kesenian berhasil dihapus');
    }

    public function test_unauthorized_user_cannot_delete_kesenian()
    {
        $owner = User::factory()->create();
        $anotherUser = User::factory()->create();
        $kesenian = Kesenian::factory()->create(['user_id' => $owner->id]);

        $this->actingAs($anotherUser);

        $response = $this->delete(route('kesenian.destroy', $kesenian));

        $response->assertStatus(403);
        $this->assertDatabaseHas('kesenian', ['id' => $kesenian->id]);
    }
}
