<?php

namespace App\Filament\Admin\Resources\Blogs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;
use App\Models\User;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Author (User)')
                    ->relationship('user', 'name')
                    ->default(fn () => Auth::id())
                    ->required()
                    ->disabled(),

                TextInput::make('title')
                    ->label('Blog Title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255)
                    ->hint('Auto-generated from title if not provided'),

                Textarea::make('excerpt')
                    ->label('Excerpt')
                    ->rows(3)
                    ->maxLength(500)
                    ->nullable(),

                Select::make('category')
                    ->label('Category')
                    ->options([
                        'web-development' => 'Web Development',
                        'ai' => 'Artificial Intelligence',
                        'design' => 'UI/UX Design',
                        'mobile' => 'Mobile Development',
                        'devops' => 'DevOps',
                        'security' => 'Cyber Security',
                        'cloud' => 'Cloud Computing',
                        'marketing' => 'Digital Marketing',
                        'data-science' => 'Data Science',
                        'blockchain' => 'Blockchain',
                        'productivity' => 'Productivity',
                        'career' => 'Career & Growth',
                    ])
                    ->required(),

                TextInput::make('author')
                    ->label('Author Name')
                    ->default(fn () => Auth::user()?->name)
                    ->disabled()
                    ->dehydrated(), 
                    
                DatePicker::make('date')
                    ->label('Publication Date')
                    ->required(),

                TextInput::make('readTime')
                    ->label('Read Time')
                    ->placeholder('e.g. 8 min read')
                    ->maxLength(50)
                    ->nullable(),

                Toggle::make('featured')
                    ->label('Featured')
                    ->default(false),

                TagsInput::make('tags')
                    ->label('Tags')
                    ->placeholder('Add tags like React, AI, PWA')
                    ->separator(','),

                FileUpload::make('image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('blogs/images')
                    ->maxSize(2048)
                    ->nullable(),
            ])->columns(1);
    }
}
