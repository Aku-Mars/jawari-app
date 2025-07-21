<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;


class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;

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
}
