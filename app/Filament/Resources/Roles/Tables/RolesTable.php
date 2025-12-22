<?php

namespace App\Filament\Resources\Roles\Tables;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RolesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم الدور')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('permissions_count')
                    ->label('الصلاحيات')
                    ->counts('permissions')
                    ->badge()
                    ->color('success'),
                TextColumn::make('users_count')
                    ->label('المستخدمين')
                    ->counts('users')
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
            ->emptyStateHeading('لا توجد أدوار')
            ->emptyStateDescription('قم بإضافة دور للبدء.')
            ->emptyStateIcon('heroicon-o-shield-check');
    }
}
