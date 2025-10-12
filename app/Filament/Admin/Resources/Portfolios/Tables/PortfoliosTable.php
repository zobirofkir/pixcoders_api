<?php

namespace App\Filament\Admin\Resources\Portfolios\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('category')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->sortable(),

                TagsColumn::make('technologies')
                    ->label('Technologies'),

                TextColumn::make('link')
                    ->label('Link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab(),

                IconColumn::make('featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
