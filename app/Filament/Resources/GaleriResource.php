<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages\{CreateGaleri, EditGaleri, ListGaleris};
use App\Models\Galeri;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\{EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction};

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $pluralLabel = 'Galeri';
    protected static ?string $modelLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Pemilik')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                FileUpload::make('file_path')
                    ->label('Foto Galeri')
                    ->directory('galeri-files')
                    ->preserveFilenames()
                    ->image()
                    ->imageEditor()
                    ->maxSize(2048)
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->autosize(),

                Toggle::make('status')
                    ->label('Tampilkan ke Publik')
                    ->inline(false)
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_path')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->width(80),

                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('deskripsi')
                    ->limit(30)
                    ->wrap(),

                IconColumn::make('status')
                    ->label('Publik')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([])
            ->actions([
                EditAction::make()->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Hapus Galeri Ini?')
                    ->modalDescription('Apakah and Yakin ingin menghapus galeri ini?')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->modalCancelActionLabel('Batal'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Hapus Terpilih'),
                ])->label('Aksi')
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGaleris::route('/'),
            'create' => CreateGaleri::route('/create'),
            'edit' => EditGaleri::route('/{record}/edit'),
        ];
    }
}
