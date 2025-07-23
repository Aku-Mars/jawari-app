<?php

namespace App\Filament\Resources\ArtikelResource\Pages;

use App\Filament\Resources\ArtikelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\Action;
use Illuminate\Support\Js;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;

class CreateArtikel extends CreateRecord
{
    protected static string $resource = ArtikelResource::class;
    protected ?string $subheading = 'Tambah Artikel Baru';

    public function getTitle(): string
    {
        return 'Tambah Artikel';
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Artikel berhasil dibuat';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah Artikel';
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label('Simpan')
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return Action::make('createAnother')
            ->label('Simpan dan Tambah lainnya')
            ->action('createAnother')
            ->keyBindings(['mod+shift+s'])
            ->color('gray');
    }


    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label('Batal')
            ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = ' . Js::from($this->previousUrl ?? static::getResource()::getUrl()) . ')')
            ->color('gray');
    }

    public static function canViewAny(): bool
    {
        return true;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    // Mutate form data before saving
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Konversi file gambar ke WebP jika applicable
        if (!empty($data['file_path']) && !filter_var($data['file_path'], FILTER_VALIDATE_URL)) {
            $extension = pathinfo($data['file_path'], PATHINFO_EXTENSION);

            // Cek jika file adalah gambar (jpeg/png/jpg)
            if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
                $originalFilePath = storage_path('app/public/' . $data['file_path']);

                if (Storage::disk('public')->exists($data['file_path'])) {
                    $filename = pathinfo($data['file_path'], PATHINFO_FILENAME);
                    $webpPath = 'artikel-files/' . $filename . '.webp';

                    $manager = new ImageManager(new Driver());

                    try {
                        $image = $manager->read($originalFilePath)->toWebp(80);

                        Storage::disk('public')->put($webpPath, (string) $image);
                        Storage::disk('public')->delete($data['file_path']);

                        $data['file_path'] = $webpPath;
                    } catch (\Exception $e) {
                        Log::error('Error converting image to WebP: ' . $e->getMessage());
                    }
                }
            }
        }

        // Tambahkan user_id
        $data['user_id'] = Auth::id();

        return $data;
    }
}
