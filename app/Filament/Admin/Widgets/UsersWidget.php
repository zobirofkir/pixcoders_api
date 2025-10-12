<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersWidget extends StatsOverviewWidget
{
    protected ?string $heading = 'User Statistics';

    protected function getStats(): array
    {
        $totalUsers = User::count();

        $newUsersThisMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $activeWithBlogs = User::whereHas('blogs')->count();
        $activeWithPortfolios = User::whereHas('portfolios')->count();

        return [
            Stat::make('Total Users', number_format($totalUsers))
                ->description('Registered users in the system')
                ->icon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('New This Month', number_format($newUsersThisMonth))
                ->description('Users joined in ' . now()->format('F'))
                ->icon('heroicon-o-user-plus')
                ->color($newUsersThisMonth > 0 ? 'success' : 'gray'),

            Stat::make('With Blogs', number_format($activeWithBlogs))
                ->description('Users who have published blogs')
                ->icon('heroicon-o-document-text')
                ->color('info'),

            Stat::make('With Portfolios', number_format($activeWithPortfolios))
                ->description('Users with at least one portfolio project')
                ->icon('heroicon-o-briefcase')
                ->color('warning'),
        ];
    }
}
