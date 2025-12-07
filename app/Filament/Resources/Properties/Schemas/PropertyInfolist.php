<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Grid;
use Filament\Support\Enums\FontWeight;
use Filament\Schemas\Schema;

class PropertyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Property Information')
                    ->tabs([
                        Tab::make('Overview')
                            ->icon('heroicon-o-home')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Property Name')
                                    ->weight(FontWeight::Bold)
                                    ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('slug')
                                            ->label('URL Slug')
                                            ->icon('heroicon-o-link')
                                            ->copyable()
                                            ->color('gray'),
                                        TextEntry::make('price')
                                            ->label('Price')
                                            ->icon('heroicon-o-currency-dollar')
                                            ->money('USD')
                                            ->weight(FontWeight::Bold)
                                            ->color('success'),
                                    ]),
                                TextEntry::make('description')
                                    ->label('Description')
                                    ->columnSpanFull()
                                    ->markdown(),
                            ]),

                        Tab::make('Images')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                ImageEntry::make('images')
                                    ->hiddenLabel()
                                    ->columnSpanFull()
                                    ->square()
                                    ->limit(10)
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
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('bedrooms')
                                            ->label('Bedrooms')
                                            ->icon('heroicon-o-home')
                                            ->suffix(' Beds')
                                            ->color('primary'),
                                        TextEntry::make('bathrooms')
                                            ->label('Bathrooms')
                                            ->icon('heroicon-o-rectangle-stack')
                                            ->suffix(' Baths')
                                            ->color('primary'),
                                        TextEntry::make('space')
                                            ->label('Area')
                                            ->icon('heroicon-o-arrows-pointing-out')
                                            ->suffix(' Sq. Ft')
                                            ->color('primary'),
                                    ]),
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

                        Tab::make('Relationships')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('project.name')
                                            ->label('Project')
                                            ->icon('heroicon-o-building-office')
                                            ->default('No Project'),
                                        TextEntry::make('agent.name')
                                            ->label('Assigned Agent')
                                            ->icon('heroicon-o-user')
                                            ->default('No Agent'),
                                    ]),
                            ]),

                        Tab::make('Status')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Grid::make(4)
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
                                        IconEntry::make('is_for_rent')
                                            ->label('For Rent')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-key')
                                            ->falseIcon('heroicon-o-key')
                                            ->trueColor('info')
                                            ->falseColor('gray'),
                                        IconEntry::make('is_for_sale')
                                            ->label('For Sale')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-currency-dollar')
                                            ->falseIcon('heroicon-o-currency-dollar')
                                            ->trueColor('success')
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
