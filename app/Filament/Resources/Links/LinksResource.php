<?php

namespace App\Filament\Resources\Links;

use App\Filament\Resources\Links\Pages\CreateLinks;
use App\Filament\Resources\Links\Pages\EditLinks;
use App\Filament\Resources\Links\Pages\ListLinks;
use App\Filament\Resources\Links\Schemas\LinksForm;
use App\Filament\Resources\Links\Tables\LinksTable;
use App\Models\Links;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use UnitEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LinksResource extends Resource
{
    protected static ?string $model = Links::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLink;

    protected static string|UnitEnum|null $navigationGroup = 'Team & Links';
    
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'links';

    public static function form(Schema $schema): Schema
    {
        return LinksForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LinksTable::configure($table);
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
            'index' => ListLinks::route('/'),
            'create' => CreateLinks::route('/create'),
            'edit' => EditLinks::route('/{record}/edit'),
        ];
    }
}
