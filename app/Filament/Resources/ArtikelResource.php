<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtikelResource\Pages\{CreateArtikel, EditArtikel, ListArtikels};
use App\Models\Artikel;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, FileUpload, Hidden};
use Filament\Tables\Table;
use Filament\Tables\Actions\{EditAction, DeleteBulkAction, BulkActionGroup, DEleteAction};
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\MarkdownEditor;

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

                MarkdownEditor::make('deskripsi')
                    ->label('Deskripsi Artikel')
                    ->required()
                    ->columnSpanFull(),
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
                EditAction::make()->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Hapus Artikel Ini?')
                    ->modalDescription(fn($record) => 'Apakah kamu yakin ingin menghapus artikel berjudul "' . $record->judul . '"?')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->modalCancelActionLabel('Batal')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Hapus Terpilih'),
                ])->label('Aksi'),
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
            'index' => ListArtikels::route('/'),
            'create' => CreateArtikel::route('/create'),
            'edit' => EditArtikel::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['Super Admin', 'Admin']);
    }
}
