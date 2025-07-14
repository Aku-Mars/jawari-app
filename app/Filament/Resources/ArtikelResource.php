<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtikelResource\Pages;
use App\Models\Artikel;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Hidden};
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $pluralLabel = 'Artikel';
    protected static ?string $modelLabel = 'Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn() => Auth::id()),

                TextInput::make('judul')
                    ->label('Judul Artikel')
                    ->maxLength(100)
                    ->required(),

                TextInput::make('penulis')
                    ->default(fn() => Auth::user()->name)
                    ->maxLength(100)
                    ->required(),

                TextInput::make('views')
                    ->numeric()
                    ->default(0)
                    ->required(),

                FileUpload::make('file_path')
                    ->label('Lampiran Gambar atau Video')
                    ->directory('artikel-files')
                    ->acceptedFileTypes([
                        'image/*',
                        'video/*',
                    ])
                    ->nullable(),


                TextInput::make('link_youtube')
                    ->label('Link YouTube')
                    ->url()
                    ->nullable(),

                Textarea::make('deskripsi')
                    ->rows(5)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->searchable()->sortable(),
                TextColumn::make('penulis'),
                TextColumn::make('views')->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return true;
    }
}
