<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('users_id')
                    ->required()
                    ->numeric(),
                TextInput::make('montant')
                    ->required()
                    ->numeric(),
                TextInput::make('state')
                    ->required(),
            ]);
    }
}
