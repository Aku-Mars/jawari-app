<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    protected ?string $subheading = 'Daftar Pengguna';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Pengguna')
                ->icon('heroicon-o-plus')
                ->color('primary')
                ->keyBindings(['mod+n']),
        ];
    }

    public function getBreadcrumb(): string
    {
        return 'Daftar Pengguna';
    }
}
