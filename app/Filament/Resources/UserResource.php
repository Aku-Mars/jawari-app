<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\{ListUsers, CreateUser, EditUser};
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\{EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction};
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Auth;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';
    protected static ?string $modelLabel = 'Pengguna';
    protected static ?string $pluralLabel = 'Pengguna';


    public static function canAccess(): bool
    {
        /** @var \App\Models\User|\Spatie\Permission\Traits\HasRoles $user */
        $user = Auth::user();
        return $user->hasRole('Super Admin');
    }

    public static function form(Form $form): Form
    {
        /** @var \App\Models\User|\Spatie\Permission\Traits\HasRoles $user */
        $user = Auth::user();

        return $form->schema([
            TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(100),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(100),

            TextInput::make('password')
                ->label('Password')
                ->password()
                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                ->dehydrated(fn($state) => filled($state))
                ->required(fn(string $context) => $context === 'create')
                ->maxLength(255)
                ->autocomplete('new-password'),

            Select::make('roles')
                ->relationship('roles', 'name')
                ->preload()
                ->searchable()
                ->required()
                ->hidden(fn() => !$user->hasRole('Super Admin'))
                ->disabled(fn($record) => $record && $user && $record->id === $user->id),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nama')->searchable()->sortable(),
            TextColumn::make('email')->label('Email')->sortable(),
            TextColumn::make('roles.name')
                ->label('Peran')
                ->badge()
                ->color(fn(string $state) => match ($state) {
                    'Super Admin' => 'success',
                    'Admin Bidang' => 'primary',
                    'Admin' => 'warning',
                    'Staf' => 'info',
                }),
            TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
        ])
            ->actions([
                EditAction::make()->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Hapus Pengguna Ini?')
                    ->modalDescription(fn($record) => 'Apakah kamu yakin ingin menghapus pengguna "' . $record->name . '"?')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->modalCancelActionLabel('Batal'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Hapus Terpilih'),
                ])->label('Aksi'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
