<?php

namespace App\Filament\Resources\Archives\Pages;

use App\Filament\Resources\Archives\ArchivesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArchives extends EditRecord
{
    protected static string $resource = ArchivesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->successRedirectUrl(route('archives.index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('archives.index');
    }
}
