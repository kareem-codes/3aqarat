<?php

namespace App\Filament\Resources\Properties\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PropertiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('الاسم'),
                TextColumn::make('slug')
                    ->searchable()
                    ->label('الرابط'),
                IconColumn::make('status')
                    ->boolean()
                    ->label('نشط'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('مميز'),
                IconColumn::make('is_for_rent')
                    ->boolean()
                    ->label('للإيجار'),
                IconColumn::make('is_for_sale')
                    ->boolean()
                    ->label('للبيع'),
                TextColumn::make('city')
                    ->searchable()
                    ->label('المدينة'),
                TextColumn::make('state')
                    ->searchable()
                    ->label('المحافظة'),
                TextColumn::make('price')
                    ->money()
                    ->sortable()
                    ->label('السعر'),
                TextColumn::make('bedrooms')
                    ->numeric()
                    ->sortable()
                    ->label('غرف النوم'),
                TextColumn::make('bathrooms')
                    ->numeric()
                    ->sortable()
                    ->label('دورات المياه'),
                TextColumn::make('space')
                    ->numeric()
                    ->sortable()
                    ->label('المساحة'),
                TextColumn::make('project_id')
                    ->numeric()
                    ->sortable()
                    ->label('رقم المشروع'),
                TextColumn::make('agent_id')
                    ->numeric()
                    ->sortable()
                    ->label('رقم الوكيل'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ الإنشاء'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ التحديث'),
            ])
            ->filters([
                //
            ])
            ->emptyStateHeading('لا توجد عقارات')
            ->emptyStateDescription('قم بإضافة عقار للبدء.')
            ->emptyStateIcon('heroicon-o-building-office')
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
