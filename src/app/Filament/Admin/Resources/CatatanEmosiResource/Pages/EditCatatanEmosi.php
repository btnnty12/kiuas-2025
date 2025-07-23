<?php

namespace App\Filament\Admin\Resources\CatatanEmosiResource\Pages;

use App\Filament\Admin\Resources\CatatanEmosiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatatanEmosi extends EditRecord
{
    protected static string $resource = CatatanEmosiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
