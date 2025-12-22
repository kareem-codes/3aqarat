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
                Tabs::make('معلومات العقار')
                    ->tabs([
                        Tab::make('نظرة عامة')
                            ->icon('heroicon-o-home')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('اسم العقار')
                                    ->weight(FontWeight::Bold)
                                    ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('slug')
                                            ->label('الرابط')
                                            ->icon('heroicon-o-link')
                                            ->copyable()
                                            ->color('gray'),
                                        TextEntry::make('price')
                                            ->label('السعر')
                                            ->icon('heroicon-o-currency-dollar')
                                            ->money('USD')
                                            ->weight(FontWeight::Bold)
                                            ->color('success'),
                                    ]),
                                TextEntry::make('description')
                                    ->label('الوصف')
                                    ->columnSpanFull()
                                    ->markdown(),
                            ]),

                        Tab::make('الصور')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                ImageEntry::make('images')
                                    ->hiddenLabel()
                                    ->columnSpanFull()
                                    ->square()
                                    ->limit(10)
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
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('bedrooms')
                                            ->label('غرف النوم')
                                            ->icon('heroicon-o-home')
                                            ->suffix(' غرفة')
                                            ->color('primary'),
                                        TextEntry::make('bathrooms')
                                            ->label('دورات المياه')
                                            ->icon('heroicon-o-rectangle-stack')
                                            ->suffix(' حمام')
                                            ->color('primary'),
                                        TextEntry::make('space')
                                            ->label('المساحة')
                                            ->icon('heroicon-o-arrows-pointing-out')
                                            ->suffix(' قدم مربع')
                                            ->color('primary'),
                                    ]),
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

                        Tab::make('الارتباطات')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('project.name')
                                            ->label('المشروع')
                                            ->icon('heroicon-o-building-office')
                                            ->default('لا يوجد مشروع'),
                                        TextEntry::make('agent.name')
                                            ->label('الوكيل المعين')
                                            ->icon('heroicon-o-user')
                                            ->default('لا يوجد وكيل'),
                                    ]),
                            ]),

                        Tab::make('الحالة')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Grid::make(4)
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
                                        IconEntry::make('is_for_rent')
                                            ->label('للإيجار')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-key')
                                            ->falseIcon('heroicon-o-key')
                                            ->trueColor('info')
                                            ->falseColor('gray'),
                                        IconEntry::make('is_for_sale')
                                            ->label('للبيع')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-currency-dollar')
                                            ->falseIcon('heroicon-o-currency-dollar')
                                            ->trueColor('success')
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
