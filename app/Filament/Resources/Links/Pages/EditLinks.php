<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinksResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLinks extends EditRecord
{
    protected static string $resource = LinksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
