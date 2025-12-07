<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentProperties extends BaseWidget
{
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Property::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Property Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('city')
                    ->label('City')
                    ->icon('heroicon-o-map-pin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('USD')
                    ->sortable()
                    ->color('success'),
                Tables\Columns\TextColumn::make('bedrooms')
                    ->label('Beds')
                    ->suffix(' Beds')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->label('Baths')
                    ->suffix(' Baths')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Added')
                    ->since()
                    ->sortable(),
            ]);
    }

    protected function getTableHeading(): ?string
    {
        return 'Recently Added Properties';
    }
}
