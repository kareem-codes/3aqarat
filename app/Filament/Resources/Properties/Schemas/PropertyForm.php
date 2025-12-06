<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PropertyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('images')
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_for_rent')
                    ->required(),
                Toggle::make('is_for_sale')
                    ->required(),
                Textarea::make('categories')
                    ->columnSpanFull(),
                TextInput::make('city'),
                TextInput::make('state'),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('bedrooms')
                    ->numeric(),
                TextInput::make('bathrooms')
                    ->numeric(),
                TextInput::make('space')
                    ->numeric(),
                TextInput::make('project_id')
                    ->numeric(),
                TextInput::make('agent_id')
                    ->numeric(),
            ]);
    }
}
