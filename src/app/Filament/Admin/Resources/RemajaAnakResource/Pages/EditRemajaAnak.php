<?php

namespace App\Filament\Admin\Resources\RemajaAnakResource\Pages;

use App\Filament\Admin\Resources\RemajaAnakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRemajaAnak extends EditRecord
{
    protected static string $resource = RemajaAnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
