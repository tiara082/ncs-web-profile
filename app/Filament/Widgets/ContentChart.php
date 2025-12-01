<?php

namespace App\Filament\Widgets;

use App\Models\Content;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ContentChart extends ChartWidget
{
    protected ?string $heading = 'Content Created';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Get content counts by type
        $articleCount = Content::where('content_type', 'article')->count();
        $newsCount = Content::where('content_type', 'news')->count();
        $announcementCount = Content::where('content_type', 'announcement')->count();
        $researchCount = Content::where('content_type', 'research')->count();
        $projectCount = Content::where('content_type', 'project')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Content Distribution',
                    'data' => [$articleCount, $newsCount, $announcementCount, $researchCount, $projectCount],
                    'backgroundColor' => [
                        'rgb(102, 187, 242)',  // primary
                        'rgb(34, 47, 127)',    // secondary
                        'rgb(251, 191, 36)',   // warning
                        'rgb(16, 185, 129)',   // success
                        'rgb(239, 68, 68)',    // danger
                    ],
                ],
            ],
            'labels' => ['Articles', 'News', 'Announcements', 'Research', 'Projects'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
