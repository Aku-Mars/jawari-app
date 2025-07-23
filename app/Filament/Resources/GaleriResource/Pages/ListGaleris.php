<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGaleris extends ListRecords
{
    protected static string $resource = GaleriResource::class;
    protected ?string $subheading = "Daftar Galeri";

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Galeri')->icon('heroicon-o-plus')->color('primary')->keyBindings(['mod+n']),
        ];
    }

    public function getBreadcrumb(): string
    {
        return 'Daftar Galeri';
    }
}
