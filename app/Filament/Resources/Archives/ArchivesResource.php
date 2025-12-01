<?php

namespace App\Filament\Resources\Archives;

use App\Filament\Resources\Archives\Pages\CreateArchives;
use App\Filament\Resources\Archives\Pages\EditArchives;
use App\Filament\Resources\Archives\Pages\ListArchives;
use App\Filament\Resources\Archives\Schemas\ArchivesForm;
use App\Filament\Resources\Archives\Tables\ArchivesTable;
use App\Models\Archives;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use UnitEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArchivesResource extends Resource
{
    protected static ?string $model = Archives::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static string|UnitEnum|null $navigationGroup = 'Content Management';
    
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'archives';

    public static function form(Schema $schema): Schema
    {
        return ArchivesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArchivesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListArchives::route('/'),
            'create' => CreateArchives::route('/create'),
            'edit' => EditArchives::route('/{record}/edit'),
        ];
    }
}
