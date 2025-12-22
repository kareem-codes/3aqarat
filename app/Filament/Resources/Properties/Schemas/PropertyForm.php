<?php

namespace App\Filament\Resources\Properties\Schemas;

use App\Models\Agent;
use App\Models\Project;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PropertyForm
{
    private static array $categories = [
        'apartment' => 'شقة',
        'house' => 'منزل',
        'villa' => 'فيلا',
        'townhouse' => 'تاون هاوس',
        'land' => 'أرض',
        'commercial' => 'تجاري',
        'office' => 'مساحة مكتبية',
        'retail' => 'متجر',
        'warehouse' => 'مستودع',
        'studio' => 'ستوديو',
        'penthouse' => 'بنتهاوس',
        'duplex' => 'دوبلكس',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('تفاصيل العقار')
                    ->tabs([
                        Tab::make('المعلومات الأساسية')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('اسم العقار')
                                    ->placeholder('مثال: شقة حديثة في وسط المدينة')
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->required()
                                    ->label('الرابط')
                                    ->placeholder('مثال: modern-downtown-apartment')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->required()
                                    ->label('الوصف')
                                    ->placeholder('قدم وصفاً تفصيلياً للعقار...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('تفاصيل العقار')
                            ->icon('heroicon-o-home')
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
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->label('السعر')
                                    ->prefix('$')
                                    ->step(0.01),
                                TextInput::make('bedrooms')
                                    ->numeric()
                                    ->label('غرف النوم')
                                    ->default(0)
                                    ->minValue(0),
                                TextInput::make('bathrooms')
                                    ->numeric()
                                    ->label('دورات المياه')
                                    ->default(0)
                                    ->minValue(0),
                                TextInput::make('space')
                                    ->numeric()
                                    ->label('المساحة (قدم مربع)')
                                    ->placeholder('مثال: 2500')
                                    ->minValue(0),
                            ])
                            ->columns(2),

                        Tab::make('الارتباطات')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Select::make('project_id')
                                    ->label('المشروع')
                                    ->options(Project::query()->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->nullable(),
                                Select::make('agent_id')
                                    ->label('الوكيل')
                                    ->options(Agent::query()->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->nullable(),
                            ])
                            ->columns(2),

                        Tab::make('الوسائط')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('images')
                                    ->label('صور العقار')
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(10)
                                    ->disk('public')
                                    ->directory('properties')
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
                                Toggle::make('is_for_rent')
                                    ->label('متاح للإيجار'),
                                Toggle::make('is_for_sale')
                                    ->label('متاح للبيع'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
