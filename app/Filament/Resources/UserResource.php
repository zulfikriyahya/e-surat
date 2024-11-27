<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Profile';
    protected static ?string $label = 'Pengguna';
    protected static ?int $sort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    // Forms
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Tab Informasi Pengguna
                Tabs::make('Informasi Pengguna')
                    ->tabs([
                        Tabs\Tab::make('Informasi Pengguna')
                            ->icon('heroicon-m-user-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->maxLength(30)
                                    ->label('Nama Lengkap')
                                    ->required(),
                                Select::make('role')
                                    ->label('Peran')
                                    ->options([
                                        'superadmin' => 'Super Admin',
                                        'administrator' => 'Administrator',
                                        'staf' => 'Staf',
                                    ])
                                    ->native(false)
                                    ->required(),
                                DateTimePicker::make('email_verified_at')
                                    ->label('Email Verified At')
                                    ->default(now())
                                    ->required(),
                                FileUpload::make('foto')
                                    ->label('Avatar')
                                    ->directory('avatar')
                                    ->image()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->imageEditor()
                                    ->fetchFileInformation(false) //skip load informasi file
                                    ->minSize(10) // 10 KB
                                    ->maxSize(1024) // 512 KB
                                    ->required(),
                            ]),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ]),

                // Tab Informasi Akun
                Tabs::make('Informasi Akun')
                    ->tabs([
                        Tabs\Tab::make('Informasi Akun')
                            ->icon('heroicon-m-cog')
                            ->schema([
                                TextInput::make('email')
                                    ->maxLength(30)
                                    ->label('Surel')
                                    ->email()
                                    ->required(),
                                TextInput::make('password')
                                    ->minLength(8)
                                    ->maxLength(50)
                                    ->password()
                                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                    ->dehydrated(fn($state) => filled($state)),
                            ]),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ]),
            ]);
    }

    // Table
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Avatar')
                    ->defaultImageUrl(url('/images/avatar.jpg'))
                    ->width(60)
                    ->height(60)
                    ->alignCenter()
                    ->circular(),
                TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Surel')
                    ->icon('heroicon-m-envelope')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    // ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->icon('heroicon-m-clock')
                    ->since()
                    ->sortable(),
                TextColumn::make('role')
                    ->label('Peran')
                    ->icon('heroicon-m-user-circle')
                    ->sortable()
                    ->searchable(),
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
                SelectFilter::make('role')
                    ->label('Peran')
                    ->options([
                        'superadmin' => 'Super Admin',
                        'administrator' => 'Administrator',
                        'staf' => 'Staf',
                    ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
