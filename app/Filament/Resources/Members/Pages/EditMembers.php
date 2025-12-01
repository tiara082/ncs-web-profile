<?php

namespace App\Filament\Resources\Members\Pages;

use App\Filament\Resources\Members\MembersResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMembers extends EditRecord
{
    protected static string $resource = MembersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
