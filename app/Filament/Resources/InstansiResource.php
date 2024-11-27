<?php

namespace App\Filament\Resources;

use App\Models\Instansi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\InstansiResource\Pages;

class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;
    protected static ?string $navigationGroup = 'Profile';
    protected static ?string $label = 'Instansi';
    protected static ?string $slug = 'instansi';
    protected static ?int $sort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    // Form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section Informasi Instansi
                Section::make('Informasi Instansi')
                    ->description('Lengkapi data instansi di bawah ini.')
                    ->schema([
                        TextInput::make('institusi')
                            ->maxLength(50)
                            ->label('Nama Institusi')
                            ->required(),
                        TextInput::make('subinstitusi')
                            ->maxLength(50)
                            ->label('Nama Sub Institusi')
                            ->required(),
                        TextInput::make('instansi')
                            ->maxLength(50)
                            ->label('Nama Instansi')
                            ->required(),
                        Select::make('status')
                            ->label('Status Penegerian')
                            ->options([
                                'negeri' => 'Negeri',
                                'swasta' => 'Swasta',
                            ])
                            ->native(false)
                            ->required(),
                        Select::make('akreditasi')
                            ->options([
                                'A' => 'Sangat Baik',
                                'B' => 'Baik',
                                'C' => 'Cukup',
                                'D' => 'Kurang',
                            ])
                            ->native(false)
                            ->required(),
                        TextInput::make('kepala_instansi')
                            ->maxLength(30)
                            ->label('Nama Kepala Instansi')
                            ->required(),
                        TextInput::make('nip_kepala')
                            ->maxLength(18)
                            ->label('NIP Kepala Instansi')
                            ->required(),
                        Textarea::make('alamat')
                            ->label('Alamat Instansi')
                            ->maxLength(180)
                            ->required(),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ]),

                // Section Informasi Logo dan TTE
                Section::make('Informasi Logo dan TTE')
                    ->schema([
                        FileUpload::make('logo_institusi')
                            ->label('Logo Institusi')
                            ->directory('logo')
                            ->preserveFilenames()
                            ->image()
                            ->imageEditor()
                            ->minSize(10)
                            ->maxSize(1024),
                        FileUpload::make('logo_instansi')
                            ->label('Logo Instansi')
                            ->preserveFilenames()
                            ->directory('logo')
                            ->image()
                            ->imageEditor()
                            ->minSize(10)
                            ->maxSize(1024),
                        FileUpload::make('tte')
                            ->label('TTE Kepala Instansi')
                            ->preserveFilenames()
                            ->directory('tte')
                            ->image()
                            ->imageEditor()
                            ->minSize(10)
                            ->maxSize(1024),
                    ])->columns([
                        'sm' => 1,
                        'md' => 3,
                        'lg' => 3,
                    ]),

                // Section Kontak
                Section::make('Kontak')
                    ->schema([
                        TextInput::make('website')
                            ->maxLength(30)
                            ->required(),
                        TextInput::make('email')
                            ->maxLength(30)
                            ->email()
                            ->required(),
                        TextInput::make('telepon')
                            ->maxLength(15)
                            ->tel()
                            ->required(),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 3,
                        'lg' => 3,
                    ]),
            ]);
    }

    // Table
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institusi')
                    ->hidden(),
                TextColumn::make('subinstitusi')
                    ->hidden(),
                ImageColumn::make('logo_institusi')
                    ->alignCenter()
                    ->defaultImageUrl(url('/images/logo-institusi.png'))
                    ->hidden(),
                ImageColumn::make('logo_instansi')
                    ->defaultImageUrl(url('/images/logo-instansi.png'))
                    ->alignCenter(),
                TextColumn::make('instansi')
                    ->icon('heroicon-m-building-office-2')
                    ->alignCenter(),
                TextColumn::make('status')
                    ->alignCenter(),
                TextColumn::make('akreditasi')
                    ->alignCenter(),
                TextColumn::make('kepala_instansi')
                    ->label('Kepala Instansi')
                    ->alignCenter(),
                ImageColumn::make('tte')
                    ->alignCenter()
                    ->defaultImageUrl(url('/images/tte-kepala-instansi.jpg')),
                TextColumn::make('nip_kepala')
                    ->alignCenter()
                    ->hidden(),
                TextColumn::make('website')
                    ->icon('heroicon-m-globe-americas')
                    ->alignCenter(),
                TextColumn::make('email')
                    ->alignCenter()
                    ->hidden(),
                TextColumn::make('telepon')
                    ->alignCenter()
                    ->hidden(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->hidden(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->hidden(),
            ]);

        // ->actions([
        //     Tables\Actions\EditAction::make(),
        // ]);
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
            'index' => Pages\ListInstansis::route('/'),
            'edit' => Pages\EditInstansi::route('/{record}/edit'),
        ];
    }
}
