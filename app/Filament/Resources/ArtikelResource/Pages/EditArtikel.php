<?php

namespace App\Filament\Resources\ArtikelResource\Pages;

use App\Filament\Resources\ArtikelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Hidden};
use Illuminate\Support\Facades\Auth;


class EditArtikel extends EditRecord
{
    protected static string $resource = ArtikelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Hidden::make('user_id')->default(Auth::id()),

            TextInput::make('judul')
                ->label('Judul Artikel')
                ->maxLength(100)
                ->required(),

            TextInput::make('penulis')
                ->maxLength(100)
                ->required(),

            TextInput::make('views')
                ->numeric()
                ->default(0)
                ->required(),

            FileUpload::make('file_path')
                ->label('Lampiran File')
                ->directory('artikel-files')
                ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                ->nullable(),

            TextInput::make('link_youtube')
                ->label('Link YouTube')
                ->url()
                ->nullable(),

            Textarea::make('deskripsi')
                ->rows(5)
                ->required(),
        ];
    }
}
