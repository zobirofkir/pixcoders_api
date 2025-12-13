<?php

namespace App\Filament\Admin\Resources\Blogs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Details')
                    ->description('Basic information about the blog post')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('user_id')
                                    ->label('Author (User)')
                                    ->relationship('user', 'name')
                                    ->default(fn () => Auth::id())
                                    ->disabled()
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Author is required.',
                                    ])
                                    ->dehydrated(),

                                TextInput::make('author')
                                    ->label('Author Name')
                                    ->default(fn () => Auth::user()?->name)
                                    ->disabled()
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Author name is required.',
                                    ])
                                    ->dehydrated(),
                            ]),

                        TextInput::make('title')
                            ->label('Blog Title')
                            ->required()
                            ->validationMessages([
                                'required' => 'Title is required.',
                            ])
                            ->maxLength(255)
                            ->columnSpanFull(),

                        RichEditor::make('excerpt')
                            ->label('Excerpt')
                            ->extraInputAttributes([
                                'class' => 'min-h-[600px] resize-y overflow-auto',
                                'style' => 'min-height: 600px; resize: vertical; overflow: auto;',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Categorization & Tags')
                    ->description('Organize your blog by category and tags')
                    ->schema([
                        Grid::make(2)
                            ->schema([
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
                                    ->searchable()
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Category is required.',
                                    ]),

                                TagsInput::make('tags')
                                    ->label('Tags')
                                    ->placeholder('Add tags like React, AI, PWA')
                                    ->separator(',')
                                    ->suggestions([
                                        'React', 'Laravel', 'Next.js', 'Tailwind', 'Python',
                                        'Docker', 'AWS', 'Kubernetes', 'SEO', 'Node.js',
                                        'AI', 'Vue', 'PHP', 'GitHub', 'Firebase',
                                    ])
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'At least one tag is required.',
                                    ]),
                            ])->columns(1),
                    ]),

                Section::make('Media')
                    ->description('Upload a featured image for your blog post')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Featured Image')
                            ->image()
                            ->directory('blogs/images')
                            ->disk('public')
                            ->maxSize(2048)
                            ->imagePreviewHeight('250')
                            ->required()
                            ->validationMessages([
                                'required' => 'Featured image is required.',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Publication Settings')
                    ->description('Control visibility and timing')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                DatePicker::make('date')
                                    ->label('Publication Date')
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Publication date is required.',
                                    ]),

                                Toggle::make('featured')
                                    ->label('Featured')
                                    ->default(false),
                            ])->columns(1),
                    ]),

            ])->columns(1);
    }
}
