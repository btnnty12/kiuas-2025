<?php

namespace App\Filament\Admin\Resources\CatatanEmosiResource\Pages;

use App\Filament\Admin\Resources\CatatanEmosiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatatanEmosis extends ListRecords
{
    protected static string $resource = CatatanEmosiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
