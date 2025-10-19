<?php

namespace App\Filament\Admin\Resources\GetStarteds\Pages;

use App\Filament\Admin\Resources\GetStarteds\GetStartedResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGetStarteds extends ListRecords
{
    protected static string $resource = GetStartedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
