<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Filament\Actions\Action;
use Illuminate\Support\Js;

class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;
    protected ?string $subheading = 'Edit Galeri';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Hapus Galeri'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Edit Galeri')
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
        return 'Galeri berhasil diperbarui';
    }

    public function getBreadcrumb(): string
    {
        return 'Edit Galeri';
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
                    Log::error('Error converting image to WebP:' . $e->getMessage());
                }
            }
        }

        $data['user_id'] = Auth::id();

        return $data;
    }
}
