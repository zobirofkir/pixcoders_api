<?php

namespace App\Filament\Admin\Resources\GetStarteds\Pages;

use App\Filament\Admin\Resources\GetStarteds\GetStartedResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGetStarted extends ViewRecord
{
    protected static string $resource = GetStartedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
