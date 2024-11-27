<?php

namespace App\Filament\Resources;

use App\Models\Pegawai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\PegawaiResource\Pages\EditPegawai;
use App\Filament\Resources\PegawaiResource\Pages\ListPegawais;
use App\Filament\Resources\PegawaiResource\Pages\CreatePegawai;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;
    protected static ?string $slug = 'pegawai';
    protected static ?string $navigationGroup = 'Manajemen Pegawai';
    protected static ?int $sort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    // Form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->maxLength(50)
                    ->required(),
                TextInput::make('nik')
                    ->required()
                    ->label('NIK')
                    ->maxLength(16)
                    ->numeric(),
                TextInput::make('nip')
                    ->numeric()
                    ->label('NIP')
                    ->maxLength(18),
                TextInput::make('nuptk')
                    ->numeric()
                    ->label('NUPTK')
                    ->maxLength(16),
                Select::make('jabatan_id')
                    ->label('Jabatan')
                    ->relationship('jabatan', 'jabatan')
                    ->required(),
                FileUpload::make('foto')
                    ->image()
                    ->directory('foto')
                    ->imageEditor()
                    ->minSize(10)
                    ->maxSize(1024)
                    ->fetchFileInformation(false) //skip load informasi file
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->email(),
                TextInput::make('telepon')
                    ->tel(),
                Select::make('status')
                    ->options([
                        'PNS' => 'Pegawai Negeri Sipil',
                        'PPNPN' => 'Pegawai Pemerintah Non Pegawai Negeri',
                        'Honorer' => 'Honorer',
                    ])
                    ->required(),
                Toggle::make('isAktif')
                    ->label('Aktif Bekerja?')
                    ->required(),
            ]);
    }

    // Tabel
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->circular(),
                TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable(),
                TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable(),
                TextColumn::make('nip')
                    ->label('NIP')
                    ->sortable(),
                TextColumn::make('nuptk')
                    ->label('NUPTK')
                    ->sortable(),
                TextColumn::make('jabatan.jabatan')
                    ->icon('heroicon-m-briefcase')
                    ->sortable(),
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope')
                    ->searchable(),
                TextColumn::make('telepon')
                    ->icon('heroicon-m-phone')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status Pegawai')
                    ->searchable(),
                IconColumn::make('isAktif')
                    ->label('Aktif Bekerja')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => ListPegawais::route('/'),
            'create' => CreatePegawai::route('/create'),
            'edit' => EditPegawai::route('/{record}/edit'),
        ];
    }
}
