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
                    ->label('اسم الوكيل')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->icon('heroicon-o-envelope')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->icon('heroicon-o-phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('properties_count')
                    ->label('العقارات')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('leads_count')
                    ->label('العملاف')
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('rating')
                    ->label('التقييم')
                    ->icon('heroicon-o-star')
                    ->color('warning')
                    ->sortable(),
            ])
            ->emptyStateHeading('لا يوجد وكلاء')
            ->emptyStateDescription('قم بإضافة وكيل للبدء.')
            ->emptyStateIcon('heroicon-o-user-circle');
    }

    protected function getTableHeading(): ?string
    {
        return 'أفضل الوكلاء أداءً';
    }
}
