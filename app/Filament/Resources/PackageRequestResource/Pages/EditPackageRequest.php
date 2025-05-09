<?php

namespace App\Filament\Resources\PackageRequestResource\Pages;

use App\Filament\Resources\PackageRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackageRequest extends EditRecord
{
    protected static string $resource = PackageRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
