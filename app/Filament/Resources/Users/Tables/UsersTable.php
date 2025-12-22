<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope')
                    ->copyable(),
                TextColumn::make('roles.name')
                    ->label('الأدوار')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                TextColumn::make('permissions_count')
                    ->label('الصلاحيات المباشرة')
                    ->counts('permissions')
                    ->badge()
                    ->color('info'),
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('تاريخ التحديث')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->label('الأدوار'),
            ])
            ->emptyStateHeading('لا يوجد مستخدمين')
            ->emptyStateDescription('قم بإضافة مستخدم للبدء.')
            ->emptyStateIcon('heroicon-o-users');
    }
}
