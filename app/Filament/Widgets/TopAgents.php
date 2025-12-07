<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopAgents extends BaseWidget
{
    protected static ?int $sort = 6;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Agent::query()
                    ->withCount('properties')
                    ->withCount('leads')
                    ->where('status', true)
                    ->orderByDesc('properties_count')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Agent Name')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->icon('heroicon-o-phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('properties_count')
                    ->label('Properties')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('leads_count')
                    ->label('Leads')
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->icon('heroicon-o-star')
                    ->color('warning')
                    ->sortable(),
            ]);
    }

    protected function getTableHeading(): ?string
    {
        return 'Top Performing Agents';
    }
}
