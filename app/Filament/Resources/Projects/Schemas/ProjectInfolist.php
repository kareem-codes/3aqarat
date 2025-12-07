<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Grid;
use Filament\Support\Enums\FontWeight;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Project Information')
                    ->tabs([
                        Tab::make('Overview')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Project Name')
                                    ->weight(FontWeight::Bold)
                                    ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('slug')
                                            ->label('URL Slug')
                                            ->icon('heroicon-o-link')
                                            ->copyable()
                                            ->color('gray'),
                                        TextEntry::make('properties_count')
                                            ->label('Total Properties')
                                            ->icon('heroicon-o-home')
                                            ->suffix(' Properties')
                                            ->weight(FontWeight::Bold)
                                            ->color('primary'),
                                    ]),
                                TextEntry::make('description')
                                    ->label('Description')
                                    ->columnSpanFull()
                                    ->markdown(),
                                TextEntry::make('price_range')
                                    ->label('Price Range')
                                    ->icon('heroicon-o-currency-dollar')
                                    ->color('success')
                                    ->weight(FontWeight::Bold)
                                    ->default('No properties yet'),
                            ]),

                        Tab::make('Images')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                ImageEntry::make('images')
                                    ->hiddenLabel()
                                    ->columnSpanFull()
                                    ->square()
                                    ->limit(15)
                                    ->limitedRemainingText(),
                            ]),

                        Tab::make('Details')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                TextEntry::make('categories')
                                    ->label('Categories')
                                    ->badge()
                                    ->separator(',')
                                    ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('city')
                                            ->label('City')
                                            ->icon('heroicon-o-building-office-2'),
                                        TextEntry::make('state')
                                            ->label('State/Province')
                                            ->icon('heroicon-o-map'),
                                    ]),
                            ]),

                        Tab::make('Status')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        IconEntry::make('status')
                                            ->label('Active')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-check-circle')
                                            ->falseIcon('heroicon-o-x-circle')
                                            ->trueColor('success')
                                            ->falseColor('danger'),
                                        IconEntry::make('is_featured')
                                            ->label('Featured')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-star')
                                            ->falseIcon('heroicon-o-star')
                                            ->trueColor('warning')
                                            ->falseColor('gray'),
                                    ]),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('created_at')
                                            ->label('Created At')
                                            ->icon('heroicon-o-plus-circle')
                                            ->dateTime()
                                            ->color('gray'),
                                        TextEntry::make('updated_at')
                                            ->label('Last Updated')
                                            ->icon('heroicon-o-pencil-square')
                                            ->dateTime()
                                            ->since()
                                            ->color('gray'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
