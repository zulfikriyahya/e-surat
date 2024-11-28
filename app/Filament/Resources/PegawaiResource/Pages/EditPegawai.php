<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PegawaiResource;


class EditPegawai extends EditRecord
{
    protected static string $resource = PegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
