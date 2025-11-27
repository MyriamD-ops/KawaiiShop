<?php

namespace App\Filament\Resources\OrderCarts\Pages;

use App\Filament\Resources\OrderCarts\OrderCartResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrderCarts extends ListRecords
{
    protected static string $resource = OrderCartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
