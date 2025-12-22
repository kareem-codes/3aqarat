<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->label('الاسم'),
                TextColumn::make('slug')
                ->sortable()
                ->searchable()
                ->label('الرابط'),
                TextColumn::make('city')
                ->sortable()
                ->searchable()
                ->label('المدينة'),
            TextColumn::make('properties_count')
                ->searchable()
                ->label('إجمالي العقارات')
                ->sortable(),
                TextColumn::make('state')
                ->sortable()
                ->searchable()
                ->label('المحافظة'),
                IconColumn::make('status')
                    ->boolean()
                    ->label('نشط'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('مميز'),
                TextColumn::make('created_at')
                ->sortable()
                ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ الإنشاء'),
                TextColumn::make('updated_at')
                ->sortable()
                ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ التحديث'),
            ])
            ->filters([
                //
            ])
            ->emptyStateHeading('لا توجد مشاريع')
            ->emptyStateDescription('قم بإضافة مشروع للبدء.')
            ->emptyStateIcon('heroicon-o-globe-europe-africa')
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
