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
                    ->label('اسم العقار')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('city')
                    ->label('المدينة')
                    ->icon('heroicon-o-map-pin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('USD')
                    ->sortable()
                    ->color('success'),
                Tables\Columns\TextColumn::make('bedrooms')
                    ->label('غرف النوم')
                    ->suffix(' غرفة')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->label('دورات المياه')
                    ->suffix(' حمام')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('الحالة')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('أضيف')
                    ->since()
                    ->sortable(),
            ])
            ->emptyStateHeading('لا توجد عقارات')
            ->emptyStateDescription('قم بإضافة عقار للبدء.')
            ->emptyStateIcon('heroicon-o-building-office');
    }

    protected function getTableHeading(): ?string
    {
        return 'العقارات المضافة حديثاً';
    }
}
