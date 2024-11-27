<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Profile';
    protected static ?string $label = 'Pengguna';
    protected static ?int $sort = 2;


    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pengguna')
                    ->description('Lengkapi data pengguna di bawah ini.')
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
                        Forms\Components\DateTimePicker::make('email_verified_at')
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
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 3,
                        'lg' => 3,
                    ]),
                Section::make('Informasi Akun')
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
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Avatar')
                    ->defaultImageUrl(url('/images/avatar.jpg'))
                    ->width(60)
                    ->height(60)
                    ->alignCenter()
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Surel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Peran')
                    ->sortable()
                    ->searchable(),
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
                Tables\Filters\SelectFilter::make('role')
                    ->label('Peran')
                    ->options([
                        'superadmin' => 'Super Admin',
                        'administrator' => 'Administrator',
                        'staf' => 'Staf',
                    ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
