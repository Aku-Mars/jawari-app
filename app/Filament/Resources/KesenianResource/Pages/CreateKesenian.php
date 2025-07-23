<?php

namespace App\Filament\Resources\KesenianResource\Pages;

use App\Filament\Resources\KesenianResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Filament\Actions\Action;
use Illuminate\Support\Js;


class CreateKesenian extends CreateRecord
{
    protected static string $resource = KesenianResource::class;
    protected ?string $subheading = 'Tambah Kesenian Baru';

    public function getTitle(): string
    {
        return 'Tambah Kesenian Banten';
    }

    public function getCreatedNotificationTitle(): ?string
    {
        return 'Kesenian berhasil dibuat';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah Kesenian';
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['tipe_banner'] === 'upload' && $data['banner_image_upload'] ?? false) {
            $originalPath = storage_path('app/public/' . $data['banner_image_upload']);
            $webpPath = 'kesenian/banner/' . pathinfo($originalPath, PATHINFO_FILENAME) . '.webp';

            $manager = new ImageManager(new Driver());
            $image = $manager->read($originalPath)->toWebp(80);

            Storage::disk('public')->put($webpPath, (string) $image);

            Storage::disk('public')->delete($data['banner_image_upload']);

            $data['banner_image'] = $webpPath;
        } elseif ($data['tipe_banner'] === 'url') {
            $data['banner_image'] = $data['banner_image_url'];
        }

        $data['user_id'] = Auth::id();

        unset($data['banner_image_upload'], $data['banner_image_url']);

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
