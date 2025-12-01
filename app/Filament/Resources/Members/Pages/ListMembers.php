<?php

namespace App\Filament\Resources\Members\Pages;

use App\Filament\Resources\Members\MembersResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMembers extends ListRecords
{
    protected static string $resource = MembersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
