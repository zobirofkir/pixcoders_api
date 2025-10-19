<?php

namespace App\Filament\Admin\Resources\GetStarteds;

use App\Filament\Admin\Resources\GetStarteds\Pages\CreateGetStarted;
use App\Filament\Admin\Resources\GetStarteds\Pages\EditGetStarted;
use App\Filament\Admin\Resources\GetStarteds\Pages\ListGetStarteds;
use App\Filament\Admin\Resources\GetStarteds\Pages\ViewGetStarted;
use App\Filament\Admin\Resources\GetStarteds\Schemas\GetStartedForm;
use App\Filament\Admin\Resources\GetStarteds\Schemas\GetStartedInfolist;
use App\Filament\Admin\Resources\GetStarteds\Tables\GetStartedsTable;
use App\Models\GetStarted;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GetStartedResource extends Resource
{
    protected static ?string $model = GetStarted::class;

    protected static UnitEnum|string|null $navigationGroup = 'Get Started';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'GetStarted';

    protected static ?string $navigationLabel = 'Get Started';

    public static function form(Schema $schema): Schema
    {
        return GetStartedForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GetStartedInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GetStartedsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGetStarteds::route('/'),
            'create' => CreateGetStarted::route('/create'),
            'view' => ViewGetStarted::route('/{record}'),
            'edit' => EditGetStarted::route('/{record}/edit'),
        ];
    }
}
