<?php

namespace App\Filament\Resources\Archives\Pages;

use App\Filament\Resources\Archives\ArchivesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArchives extends CreateRecord
{
    protected static string $resource = ArchivesResource::class;

    protected function getRedirectUrl(): string
    {
        return route('archives.index');
    }
}
