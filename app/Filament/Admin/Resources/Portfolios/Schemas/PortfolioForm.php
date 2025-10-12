<?php

namespace App\Filament\Admin\Resources\Portfolios\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Schemas\Schema;
use App\Models\User;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                Select::make('category')
                    ->label('Category')
                    ->options([
                        'web_development' => 'Web Development',
                        'mobile_development' => 'Mobile Development',
                        'design' => 'Design',
                        'ui_ux' => 'UI/UX Design',
                        'backend' => 'Backend Development',
                        'frontend' => 'Frontend Development',
                        'fullstack' => 'Fullstack Development',
                        'ecommerce' => 'E-Commerce',
                        'cms' => 'CMS Projects',
                        'seo' => 'SEO Projects',
                        'marketing' => 'Marketing Tools',
                        'analytics' => 'Analytics',
                        'branding' => 'Branding',
                        'photography' => 'Photography',
                        'video_production' => 'Video Production',
                        'game_development' => 'Game Development',
                        'ai_ml' => 'AI / Machine Learning',
                        'blockchain' => 'Blockchain',
                        'education' => 'Educational Projects',
                    ])
                    ->required(),
                    
                Textarea::make('description')
                    ->label('Description')
                    ->required(),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('portfolios')
                    ->disk('public')
                    ->required(false)
                    ->maxSize(2048),

                TagsInput::make('technologies')
                    ->label('Technologies')
                    ->required(false),

                TextInput::make('link')
                    ->label('Project Link')
                    ->url()
                    ->required(false)
                    ->maxLength(255),

                Toggle::make('featured')
                    ->label('Featured')
                    ->required(false),

                Hidden::make('user_id')->default(Auth::user()->id)
            ])->columns(1);
    }
}
