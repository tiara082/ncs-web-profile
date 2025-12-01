<?php

namespace App\Filament\Widgets;

use App\Models\Archives;
use App\Models\Categories;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Links;
use App\Models\Members;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Contents', Content::count())
                ->description('All articles, news & announcements')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            
            Stat::make('Gallery Items', Gallery::count())
                ->description('Images, videos & documents')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success')
                ->chart([3, 2, 5, 3, 4, 5, 6, 7]),
            
            Stat::make('Team Members', Members::count())
                ->description('Active lab members')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
            
            Stat::make('Categories', Categories::count())
                ->description('Content categories')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
            
            Stat::make('Archives', Archives::count())
                ->description('Archived documents')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('secondary'),
            
            Stat::make('External Links', Links::count())
                ->description('Quick links')
                ->descriptionIcon('heroicon-m-link')
                ->color('danger'),
        ];
    }
}
