<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Blog;
use Filament\Widgets\ChartWidget;

class BlogsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Total Blogs';

    protected ?string $pollingInterval = '30s';

    protected function getData(): array
    {
        $totalBlogs = Blog::count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Blogs',
                    'data' => [$totalBlogs], 
                    'backgroundColor' => ['hsl(200, 70%, 60%)'],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Blogs'], 
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
