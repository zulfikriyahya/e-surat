<?php

namespace App\Filament\Resources;

use App\Models\Jabatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\JabatanResource\Pages\EditJabatan;
use App\Filament\Resources\JabatanResource\Pages\ListJabatans;
use App\Filament\Resources\JabatanResource\Pages\CreateJabatan;

class JabatanResource extends Resource
{
    protected static ?string $model = Jabatan::class;
    protected static ?string $navigationGroup = 'Manajemen Pegawai';
    protected static ?string $slug = 'jabatan';
    protected static ?int $sort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    // Form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('jabatan')
                    ->required(),
            ]);
    }

    // Table
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jabatan')
                    ->icon('heroicon-m-briefcase')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->icon('heroicon-m-clock'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Relasi
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Halaman
    public static function getPages(): array
    {
        return [
            'index' => ListJabatans::route('/'),
            'create' => CreateJabatan::route('/create'),
            'edit' => EditJabatan::route('/{record}/edit'),
        ];
    }
}
