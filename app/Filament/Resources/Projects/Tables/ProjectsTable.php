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
                ->searchable(),
                TextColumn::make('slug')
                ->sortable()
                ->searchable(),
                TextColumn::make('city')
                ->sortable()
                ->searchable(),
            TextColumn::make('properties_count')
                ->searchable()
                ->label('Total Properties')
                ->sortable(),
                TextColumn::make('state')
                ->sortable()
                ->searchable(),
                IconColumn::make('status')
                    ->boolean(),
                IconColumn::make('is_featured')
                    ->boolean(),
                TextColumn::make('created_at')
                ->sortable()
                ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->sortable()
                ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
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
