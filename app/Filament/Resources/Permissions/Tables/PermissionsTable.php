<?php

namespace App\Filament\Resources\Permissions\Tables;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم الصلاحية')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('guard_name')
                    ->label('الحارس')
                    ->badge()
                    ->color('info'),
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
            ])
            ->emptyStateHeading('لا توجد صلاحيات')
            ->emptyStateDescription('قم بإضافة صلاحية للبدء.')
            ->emptyStateIcon('heroicon-o-key');
    }
}
