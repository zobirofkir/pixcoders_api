<?php

namespace App\Filament\Admin\Resources\GetStarteds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GetStartedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('company_name'),
                TextInput::make('phone_number')
                    ->tel(),
                TextInput::make('service')
                    ->required(),
                TextInput::make('project_type'),
                TextInput::make('budget')
                    ->required(),
                TextInput::make('project_timeline')
                    ->required(),
                Textarea::make('project_description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
