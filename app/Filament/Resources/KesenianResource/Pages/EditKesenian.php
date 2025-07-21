<?php

namespace App\Filament\Resources\KesenianResource\Pages;

use App\Filament\Resources\KesenianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class EditKesenian extends EditRecord
{
    protected static string $resource = KesenianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
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
