<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Js;


class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected ?string $subheading = 'Tambah Pengguna Baru';

    function getTitle(): string
    {
        return 'Tambah Pengguna';
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pengguna berhasil dibuat';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah Pengguna';
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
}
