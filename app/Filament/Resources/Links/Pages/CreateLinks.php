<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinksResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLinks extends CreateRecord
{
    protected static string $resource = LinksResource::class;

    protected function getRedirectUrl(): string
    {
        return route('links.index');
    }
}
