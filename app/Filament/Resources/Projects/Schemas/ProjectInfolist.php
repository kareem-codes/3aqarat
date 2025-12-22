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
                Tabs::make('معلومات المشروع')
                    ->tabs([
                        Tab::make('نظرة عامة')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('اسم المشروع')
                                    ->weight(FontWeight::Bold)
                                    ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('slug')
                                            ->label('الرابط')
                                            ->icon('heroicon-o-link')
                                            ->copyable()
                                            ->color('gray'),
                                        TextEntry::make('properties_count')
                                            ->label('إجمالي العقارات')
                                            ->icon('heroicon-o-home')
                                            ->suffix(' عقار')
                                            ->weight(FontWeight::Bold)
                                            ->color('primary'),
                                    ]),
                                TextEntry::make('description')
                                    ->label('الوصف')
                                    ->columnSpanFull()
                                    ->markdown(),
                                TextEntry::make('price_range')
                                    ->label('نطاق الأسعار')
                                    ->icon('heroicon-o-currency-dollar')
                                    ->color('success')
                                    ->weight(FontWeight::Bold)
                                    ->default('لا توجد عقارات بعد'),
                            ]),

                        Tab::make('الصور')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                ImageEntry::make('images')
                                    ->hiddenLabel()
                                    ->columnSpanFull()
                                    ->square()
                                    ->limit(15)
                                    ->limitedRemainingText(),
                            ]),

                        Tab::make('التفاصيل')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                TextEntry::make('categories')
                                    ->label('الفئات')
                                    ->badge()
                                    ->separator(',')
                                    ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('city')
                                            ->label('المدينة')
                                            ->icon('heroicon-o-building-office-2'),
                                        TextEntry::make('state')
                                            ->label('المحافظة/الإمارة')
                                            ->icon('heroicon-o-map'),
                                    ]),
                            ]),

                        Tab::make('الحالة')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        IconEntry::make('status')
                                            ->label('نشط')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-check-circle')
                                            ->falseIcon('heroicon-o-x-circle')
                                            ->trueColor('success')
                                            ->falseColor('danger'),
                                        IconEntry::make('is_featured')
                                            ->label('مميز')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-star')
                                            ->falseIcon('heroicon-o-star')
                                            ->trueColor('warning')
                                            ->falseColor('gray'),
                                    ]),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('created_at')
                                            ->label('تاريخ الإنشاء')
                                            ->icon('heroicon-o-plus-circle')
                                            ->dateTime()
                                            ->color('gray'),
                                        TextEntry::make('updated_at')
                                            ->label('آخر تحديث')
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
