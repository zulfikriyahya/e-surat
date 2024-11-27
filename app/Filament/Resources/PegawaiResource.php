<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Filament\Resources\PegawaiResource\RelationManagers;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ramsey\Uuid\Type\Integer;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;
    protected static ?string $slug = 'pegawai';
    protected static ?string $navigationGroup = 'Manajemen Pegawai';
    protected static ?int $sort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->maxLength(50)
                    ->required(),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->label('NIK')
                    ->maxLength(16)
                    ->numeric(),
                Forms\Components\TextInput::make('nip')
                    ->numeric()
                    ->label('NIP')
                    ->maxLength(18),
                Forms\Components\TextInput::make('nuptk')
                    ->numeric()
                    ->label('NUPTK')
                    ->maxLength(16),
                Forms\Components\Select::make('jabatan_id')
                    ->label('Jabatan')
                    ->relationship('jabatan', 'jabatan')
                    ->required(),
                Forms\Components\FileUpload::make('foto')
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
                Forms\Components\Textarea::make('alamat')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('telepon')
                    ->tel(),
                Forms\Components\Select::make('status')
                    ->options([
                        'PNS' => 'Pegawai Negeri Sipil',
                        'PPNPN' => 'Pegawai Pemerintah Non Pegawai Negeri',
                        'Honorer' => 'Honorer',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('isAktif')
                    ->label('Aktif Bekerja?')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nuptk')
                    ->label('NUPTK')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jabatan.jabatan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Pegawai')
                    ->searchable(),
                Tables\Columns\IconColumn::make('isAktif')
                    ->label('Aktif Bekerja')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
