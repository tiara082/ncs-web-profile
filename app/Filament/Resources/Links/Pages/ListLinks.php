<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinksResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLinks extends ListRecords
{
    protected static string $resource = LinksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
