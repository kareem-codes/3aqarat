<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('الاسم'),
                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable()
                    ->label('رقم الهاتف'),
                TextColumn::make('time_range_to_contact')
                    ->searchable()
                    ->label('وقت التواصل'),
                TextColumn::make('property_id')
                    ->numeric()
                    ->sortable()
                    ->label('رقم العقار'),
                TextColumn::make('agent_id')
                    ->numeric()
                    ->sortable()
                    ->label('رقم الوكيل'),
                TextColumn::make('status')
                    ->searchable()
                    ->label('الحالة'),
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
            ->emptyStateHeading('لا يوجد عملاء محتملين')
            ->emptyStateDescription('قم بإضافة عميل محتمل للبدء.')
            ->emptyStateIcon('heroicon-o-envelope')
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
