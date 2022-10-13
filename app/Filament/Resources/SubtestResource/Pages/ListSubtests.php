<?php

namespace App\Filament\Resources\SubtestResource\Pages;

use App\Filament\Resources\SubtestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubtests extends ListRecords
{
    protected static string $resource = SubtestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
