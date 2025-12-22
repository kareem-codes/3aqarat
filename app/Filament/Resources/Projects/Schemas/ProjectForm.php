<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ProjectForm
{
    private static array $categories = [
        'residential' => 'سكني',
        'commercial' => 'تجاري',
        'mixed-use' => 'استخدام مختلط',
        'industrial' => 'صناعي',
        'luxury' => 'فاخر',
        'affordable' => 'إسكان ميسور',
        'gated-community' => 'مجتمع مغلق',
        'waterfront' => 'على واجهة المياه',
        'golf-course' => 'ملعب جولف',
        'eco-friendly' => 'صديق للبيئة',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('تفاصيل المشروع')
                    ->tabs([
                        Tab::make('المعلومات الأساسية')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('اسم المشروع')
                                    ->placeholder('مثال: تطوير مرتفعات وسط المدينة')
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->required()
                                    ->label('الرابط')
                                    ->placeholder('مثال: downtown-heights-development')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->required()
                                    ->label('الوصف')
                                    ->placeholder('قدم وصفاً تفصيلياً للمشروع...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('الموقع والفئات')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Select::make('categories')
                                    ->label('الفئات')
                                    ->multiple()
                                    ->required()
                                    ->options(self::$categories)
                                    ->columnSpan('full'),
                                TextInput::make('city')
                                    ->required()
                                    ->label('المدينة')
                                    ->placeholder('مثال: دبي'),
                                TextInput::make('state')
                                    ->required()
                                    ->label('المحافظة/الإمارة')
                                    ->placeholder('مثال: إمارة دبي'),
                            ])
                            ->columns(2),

                        Tab::make('الوسائط')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('images')
                                    ->label('صور المشروع')
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(15)
                                    ->disk('public')
                                    ->directory('projects')
                                    ->columnSpanFull()
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth(1920)
                                    ->imageResizeTargetHeight(1080),
                            ]),

                        Tab::make('الحالة والظهور')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Toggle::make('status')
                                    ->label('نشط')
                                    ->default(true),
                                Toggle::make('is_featured')
                                    ->label('مميز'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
