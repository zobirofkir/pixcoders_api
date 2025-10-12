<?php

namespace App\Filament\Admin\Resources\Blogs\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->rounded()
                    ->square()
                    ->height(50),

                TextColumn::make('user.name')
                    ->label('Author')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                BadgeColumn::make('category')
                    ->label('Category')
                    ->colors([
                        'primary' => 'web-development',
                        'success' => 'ai',
                        'warning' => 'design',
                        'danger' => 'mobile',
                        'secondary' => 'devops',
                        'info' => 'security',
                        'success' => 'cloud',
                        'primary' => 'marketing',
                        'secondary' => 'data-science',
                        'warning' => 'blockchain',
                        'info' => 'productivity',
                        'danger' => 'career',
                    ])
                    ->sortable()
                    ->searchable(),

                TagsColumn::make('tags')
                    ->label('Tags')
                    ->separator(',')
                    ->limit(3),

                TextColumn::make('date')
                    ->label('Publication Date')
                    ->sortable(),

                TextColumn::make('readTime')
                    ->label('Read Time')
                    ->sortable(),

                BooleanColumn::make('featured')
                    ->label('Featured')
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
