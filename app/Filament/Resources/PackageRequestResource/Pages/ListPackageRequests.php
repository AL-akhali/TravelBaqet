<?php

namespace App\Filament\Resources\PackageRequestResource\Pages;

use App\Filament\Resources\PackageRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackageRequests extends ListRecords
{
    protected static string $resource = PackageRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
