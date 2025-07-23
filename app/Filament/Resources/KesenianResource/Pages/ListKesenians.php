<?php

namespace App\Filament\Resources\KesenianResource\Pages;

use App\Filament\Resources\KesenianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKesenians extends ListRecords
{
    protected static string $resource = KesenianResource::class;
    protected ?string $subheading = 'Daftar Kesenian';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Kesenian')
                ->icon('heroicon-o-plus')
                ->color('primary')
                ->keyBindings(['mod+n']),
        ];
    }

    public function getBreadcrumb(): string
    {
        return 'Daftar Kesenian';
    }
}
