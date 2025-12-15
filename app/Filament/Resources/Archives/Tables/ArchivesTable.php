<?php

namespace App\Filament\Resources\Archives\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArchivesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image_url')
                    ->label('Cover')
                    ->size(60)
                    ->circular()
                    ->defaultImageUrl(url('/img/poltek.png')),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('publication')
                    ->label('Venue')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('year')
                    ->sortable(),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'research' => 'success',
                        'publication' => 'warning',
                        'document' => 'info',
                    }),
                TextColumn::make('doi')
                    ->label('DOI')
                    ->limit(20)
                    ->copyable()
                    ->toggleable(),
                TextColumn::make('issn_journal')
                    ->label('ISSN')
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
