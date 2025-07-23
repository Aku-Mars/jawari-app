<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Filament\Actions\Action;
use Illuminate\Support\Js;

class CreateGaleri extends CreateRecord
{
    protected static string $resource = GaleriResource::class;
    protected ?string $subheading = 'Tambah Galeri Baru';

    public function getTitle(): string
    {
        return 'Tambah Galeri';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah Galeri';
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label('Simpan')
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Galeri berhasil dibuat';
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['file_path']) && !filter_var($data['file_path'], FILTER_VALIDATE_URL)) {
            $originalFilePath = storage_path('app/public/' . $data['file_path']);

            if (Storage::disk('public')->exists($data['file_path'])) {
                $filename = pathinfo($data['file_path'], PATHINFO_FILENAME);
                $webpPath = 'galeri-files/' . $filename . '.webp';

                $manager = new ImageManager(new Driver());
                try {
                    $image = $manager->read($originalFilePath)->toWebp(80);
                    Storage::disk('public')->put($webpPath, (string) $image);

                    Storage::disk('public')->delete($data['file_path']);

                    $data['file_path'] = $webpPath;
                } catch (\Exception $e) {
                }
            } else {
            }
        }

        $data['user_id'] = Auth::id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
