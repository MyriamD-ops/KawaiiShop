<?php

namespace App\Filament\Resources\OrderCarts\Pages;

use App\Filament\Resources\OrderCarts\OrderCartResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrderCart extends EditRecord
{
    protected static string $resource = OrderCartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
