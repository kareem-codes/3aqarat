<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PropertyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('images')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('status')
                    ->boolean(),
                IconEntry::make('is_featured')
                    ->boolean(),
                IconEntry::make('is_for_rent')
                    ->boolean(),
                IconEntry::make('is_for_sale')
                    ->boolean(),
                TextEntry::make('categories')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('city')
                    ->placeholder('-'),
                TextEntry::make('state')
                    ->placeholder('-'),
                TextEntry::make('price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('bedrooms')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('bathrooms')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('space')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('project_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('agent_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
