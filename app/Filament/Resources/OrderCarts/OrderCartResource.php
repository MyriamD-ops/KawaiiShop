<?php

namespace App\Filament\Resources\OrderCarts;

use App\Filament\Resources\OrderCarts\Pages\CreateOrderCart;
use App\Filament\Resources\OrderCarts\Pages\EditOrderCart;
use App\Filament\Resources\OrderCarts\Pages\ListOrderCarts;
use App\Filament\Resources\OrderCarts\Schemas\OrderCartForm;
use App\Filament\Resources\OrderCarts\Tables\OrderCartsTable;
use App\Models\OrderCart;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrderCartResource extends Resource
{
    protected static ?string $model = OrderCart::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Order_cart';

    public static function form(Schema $schema): Schema
    {
        return OrderCartForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrderCartsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrderCarts::route('/'),
            'create' => CreateOrderCart::route('/create'),
            'edit' => EditOrderCart::route('/{record}/edit'),
        ];
    }
}
