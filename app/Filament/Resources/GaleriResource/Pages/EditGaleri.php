<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
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
}
