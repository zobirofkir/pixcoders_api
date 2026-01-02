<?php

namespace App\Filament\Admin\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
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
                    ->validationMessages([
                        'required' => 'The title field is required.',
                    ])
                    ->maxLength(255),

                Select::make('category')
                    ->label('Category')
                    ->options([
                        'web_development' => 'Web Development',
                        'mobile_development' => 'Mobile Development',
                        'frontend_development' => 'Frontend Development',
                        'backend_development' => 'Backend Development',
                        'fullstack_development' => 'Fullstack Development',
                        'ui_ux_design' => 'UI/UX Design',
                        'graphic_design' => 'Graphic Design',
                        'branding' => 'Branding',
                        'logo_design' => 'Logo Design',
                        'illustration' => 'Illustration',
                        'animation' => 'Animation',
                        'video_production' => 'Video Production',
                        'photography' => 'Photography',
                        'social_media' => 'Social Media',
                        'seo' => 'SEO Projects',
                        'content_writing' => 'Content Writing',
                        'copywriting' => 'Copywriting',
                        'email_marketing' => 'Email Marketing',
                        'digital_marketing' => 'Digital Marketing',
                        'marketing_strategy' => 'Marketing Strategy',
                        'ecommerce' => 'E-Commerce',
                        'cms' => 'CMS Projects',
                        'saas' => 'SaaS Applications',
                        'game_development' => 'Game Development',
                        'vr_ar' => 'VR / AR Projects',
                        'ai_ml' => 'AI / Machine Learning',
                        'blockchain' => 'Blockchain',
                        'fintech' => 'FinTech Projects',
                        'healthcare' => 'Healthcare Apps',
                        'education' => 'Educational Projects',
                        'productivity' => 'Productivity Tools',
                        'finance' => 'Finance Tools',
                        'travel' => 'Travel Apps',
                        'food_drink' => 'Food & Drink',
                        'entertainment' => 'Entertainment',
                        'music' => 'Music Projects',
                        'podcast' => 'Podcast Projects',
                        'fashion' => 'Fashion',
                        'lifestyle' => 'Lifestyle',
                        'sports' => 'Sports Apps',
                        'news' => 'News & Media',
                        'community' => 'Community Platforms',
                        'marketplace' => 'Marketplace Apps',
                        'events' => 'Event Management',
                        'real_estate' => 'Real Estate',
                        'logistics' => 'Logistics',
                        'iot' => 'IoT Projects',
                        'robotics' => 'Robotics',
                        'hardware' => 'Hardware Projects',
                        'research' => 'Research Projects',
                        'data_analysis' => 'Data Analysis',
                        'analytics' => 'Analytics Tools',
                        'cybersecurity' => 'Cybersecurity',
                        'networking' => 'Networking Tools',
                        'chatbot' => 'Chatbot Projects',
                        'crm' => 'CRM Systems',
                        'erp' => 'ERP Systems',
                        'inventory' => 'Inventory Management',
                        'consulting' => 'Consulting',
                        'legal' => 'Legal Tools',
                        'nonprofit' => 'Nonprofit Projects',
                        'community_service' => 'Community Service',
                        'government' => 'Government Apps',
                        'sustainability' => 'Sustainability',
                        'energy' => 'Energy Projects',
                        'transportation' => 'Transportation',
                        'automotive' => 'Automotive Projects',
                        'ai_chat' => 'AI Chat',
                        'web3' => 'Web3 Projects',
                        'nft' => 'NFT Projects',
                        'crypto' => 'Crypto Apps',
                        'smart_contracts' => 'Smart Contracts',
                        'portfolio' => 'Portfolio Websites',
                        'personal_blog' => 'Personal Blogs',
                        'corporate_website' => 'Corporate Websites',
                        'landing_page' => 'Landing Pages',
                        'campaigns' => 'Marketing Campaigns',
                        'advertising' => 'Advertising',
                        'pr' => 'Public Relations',
                        'copyediting' => 'Copyediting',
                        'translation' => 'Translation',
                        'voiceover' => 'Voiceover Projects',
                        'audiobook' => 'Audiobooks',
                        'mobile_games' => 'Mobile Games',
                        'desktop_apps' => 'Desktop Applications',
                        'utilities' => 'Utility Tools',
                        'product_design' => 'Product Design',
                        'industrial_design' => 'Industrial Design',
                        'architecture' => 'Architecture',
                        'interior_design' => 'Interior Design',
                        '3d_modeling' => '3D Modeling',
                        'virtual_events' => 'Virtual Events',
                        'online_courses' => 'Online Courses',
                        'training' => 'Training Programs',
                        'workshops' => 'Workshops',
                        'community_apps' => 'Community Apps',
                        'forums' => 'Forums',
                        'blogs' => 'Blogs',
                        'magazines' => 'Online Magazines',
                        'news_portals' => 'News Portals',
                        'podcasting' => 'Podcasting',
                        'streaming' => 'Streaming Platforms',
                        'web_tools' => 'Web Tools',
                        'plugins' => 'Plugins & Extensions',
                        'themes' => 'Website Themes',
                        'templates' => 'Templates',
                    ])
                    ->searchable()
                    ->required()
                    ->validationMessages([
                        'required' => 'The category field is required.',
                    ]),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->validationMessages([
                        'required' => 'The description field is required.',
                    ]),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('portfolios')
                    ->disk('public')
                    ->required()
                    ->maxSize(2048),

                TagsInput::make('technologies')
                    ->label('Technologies')
                    ->required()
                    ->validationMessages([
                        'required' => 'The technologies field is required.',
                    ]),

                TextInput::make('link')
                    ->label('Project Link')
                    ->url()
                    ->required()
                    ->validationMessages([
                        'required' => 'The project link field is required.',
                    ])
                    ->maxLength(255),

                Toggle::make('featured')
                    ->label('Featured')
                    ->required(false),

                Hidden::make('user_id')->default(Auth::user()->id),
            ])->columns(1);
    }
}
