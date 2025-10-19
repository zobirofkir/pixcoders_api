<?php

namespace App\Filament\Admin\Resources\GetStarteds\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GetStartedInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('company_name')
                    ->placeholder('-'),
                TextEntry::make('phone_number')
                    ->placeholder('-'),
                TextEntry::make('service'),
                TextEntry::make('project_type')
                    ->placeholder('-'),
                TextEntry::make('budget'),
                TextEntry::make('project_timeline'),
                TextEntry::make('project_description')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
