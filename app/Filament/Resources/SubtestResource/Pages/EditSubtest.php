<?php

namespace App\Filament\Resources\SubtestResource\Pages;

use App\Filament\Resources\SubtestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubtest extends EditRecord
{
    protected static string $resource = SubtestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
