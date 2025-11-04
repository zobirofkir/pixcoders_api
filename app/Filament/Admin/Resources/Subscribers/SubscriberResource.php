<?php

namespace App\Filament\Admin\Resources\Subscribers;

use App\Filament\Admin\Resources\Subscribers\Pages\CreateSubscriber;
use App\Filament\Admin\Resources\Subscribers\Pages\EditSubscriber;
use App\Filament\Admin\Resources\Subscribers\Pages\ListSubscribers;
use App\Filament\Admin\Resources\Subscribers\Pages\ViewSubscriber;
use App\Filament\Admin\Resources\Subscribers\Schemas\SubscriberForm;
use App\Filament\Admin\Resources\Subscribers\Schemas\SubscriberInfolist;
use App\Filament\Admin\Resources\Subscribers\Tables\SubscribersTable;
use App\Models\Subscriber;
use App\Policies\SubscriberPolicy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;
    protected static ?string $policy = SubscriberPolicy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'Subscribers';

    protected static ?string $recordTitleAttribute = 'Subscriber';
    
    protected static ?string $navigationLabel = 'Subscribers';


    public static function form(Schema $schema): Schema
    {
        return SubscriberForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubscriberInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubscribersTable::configure($table);
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
            'index' => ListSubscribers::route('/'),
            'create' => CreateSubscriber::route('/create'),
            'view' => ViewSubscriber::route('/{record}'),
            'edit' => EditSubscriber::route('/{record}/edit'),
        ];
    }
}
