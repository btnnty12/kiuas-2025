<?php

namespace App\Filament\Admin\Resources\RemajaAnakResource\Pages;

use App\Filament\Admin\Resources\RemajaAnakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRemajaAnak extends ListRecords
{
    protected static string $resource = RemajaAnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
