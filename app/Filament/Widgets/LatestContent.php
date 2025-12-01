<?php

namespace App\Filament\Widgets;

use App\Models\Content;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestContent extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Content::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->limit(40)
                    ->weight('bold'),
                
                TextColumn::make('content_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'article' => 'info',
                        'news' => 'success',
                        'announcement' => 'warning',
                        'research' => 'primary',
                        'project' => 'secondary',
                        default => 'gray',
                    }),
                
                TextColumn::make('creator.name')
                    ->label('Author')
                    ->icon('heroicon-m-user'),
                
                TextColumn::make('created_at')
                    ->label('Published')
                    ->dateTime()
                    ->since(),
            ]);
    }
}
