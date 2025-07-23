<?php

namespace App\Filament\Resources\KesenianResource\Pages;

use App\Filament\Resources\KesenianResource;
use Filament\Actions\{Action, DeleteAction};
use Filament\Resources\Pages\EditRecord;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Js;

class EditKesenian extends EditRecord
{
    protected static string $resource = KesenianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()->label('Hapus Kesenian'),
        ];
    }

    public function getSubheading(): ?string
    {
        return 'Perbarui Kesenian untuk ' . $this->record->sub_judul;
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Perbarui Kesenian')
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label('Batalkan')
            ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = ' . Js::from($this->previousUrl ?? static::getResource()::getUrl()) . ')')
            ->color('gray');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Kesenian berhasil diperbarui';
    }

    public function getBreadcrumb(): string
    {
        return 'Edit Kesenian';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
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
}
