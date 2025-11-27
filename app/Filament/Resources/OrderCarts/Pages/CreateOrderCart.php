<?php

namespace App\Filament\Resources\OrderCarts\Pages;

use App\Filament\Resources\OrderCarts\OrderCartResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderCart extends CreateRecord
{
    protected static string $resource = OrderCartResource::class;
}
