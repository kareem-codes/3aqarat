<?php

namespace App\Filament\Resources\Agents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('الاسم'),
                ImageColumn::make('image')
                    ->label('الصورة'),
                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable()
                    ->label('رقم الهاتف'),
                IconColumn::make('status')
                    ->boolean()
                    ->label('الحالة'),
                TextColumn::make('rating')
                    ->numeric()
                    ->sortable()
                    ->label('التقييم'),
                TextColumn::make('bio')
                    ->searchable()
                    ->label('نبذة'),
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
            ->emptyStateHeading('لا يوجد وكلاء')
            ->emptyStateDescription('قم بإضافة وكيل للبدء.')
            ->emptyStateIcon('heroicon-o-user-circle')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
