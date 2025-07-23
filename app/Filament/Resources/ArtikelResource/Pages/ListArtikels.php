<?php

namespace App\Filament\Resources\ArtikelResource\Pages;

use App\Filament\Resources\ArtikelResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListArtikels extends ListRecords
{
    protected static string $resource = ArtikelResource::class;
    protected ?string $subheading = 'Daftar Artikel';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Artikel')
                ->icon('heroicon-o-plus')
                ->color('primary')
                ->keyBindings(['mod+n']),
        ];
    }

    public function getBreadcrumb(): string
    {
        return 'Daftar Artikel';
    }
}
