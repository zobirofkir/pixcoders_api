<?php

namespace App\Filament\Admin\Resources\Portfolios\Widgets;

use App\Models\Portfolio;
use Filament\Widgets\ChartWidget;

class PortfolioChartWidget extends ChartWidget
{
    protected ?string $heading = 'Total Portfolios';

    protected ?string $pollingInterval = '30s';

    protected function getData(): array
    {
        $totalPortfolios = Portfolio::count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Portfolios',
                    'data' => [$totalPortfolios], 
                    'backgroundColor' => ['hsl(120, 70%, 60%)'], 
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Portfolios'], 
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
