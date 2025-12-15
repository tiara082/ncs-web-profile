<?php

namespace App\Filament\Resources\Members\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('member_name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
                TextColumn::make('member_role')
                    ->searchable()
                    ->sortable()
                    ->label('Role'),
                TextColumn::make('member_email')
                    ->searchable()
                    ->sortable()
                    ->label('Email')
                    ->toggleable(),
                TextColumn::make('member_phone')
                    ->searchable()
                    ->sortable()
                    ->label('Phone')
                    ->toggleable(),
                TextColumn::make('education')
                    ->label('Education')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' items' : '0 items')
                    ->toggleable(),
                TextColumn::make('research')
                    ->label('Research')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' papers' : '0 papers')
                    ->toggleable(),
                TextColumn::make('projects')
                    ->label('Projects')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' projects' : '0 projects')
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
