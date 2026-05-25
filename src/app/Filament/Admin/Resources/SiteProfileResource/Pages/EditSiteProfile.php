<?php

namespace App\Filament\Admin\Resources\SiteProfileResource\Pages;

use App\Filament\Admin\Resources\SiteProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteProfile extends EditRecord
{
    protected static string $resource = SiteProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
