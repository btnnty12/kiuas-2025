<?php

namespace App\Filament\Admin\Resources\AksesKunciResource\Pages;

use App\Filament\Admin\Resources\AksesKunciResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAksesKuncis extends ListRecords
{
    protected static string $resource = AksesKunciResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
