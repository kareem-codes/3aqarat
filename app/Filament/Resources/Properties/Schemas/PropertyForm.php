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
        'apartment' => 'Apartment',
        'house' => 'House',
        'villa' => 'Villa',
        'townhouse' => 'Townhouse',
        'land' => 'Land',
        'commercial' => 'Commercial',
        'office' => 'Office Space',
        'retail' => 'Retail',
        'warehouse' => 'Warehouse',
        'studio' => 'Studio',
        'penthouse' => 'Penthouse',
        'duplex' => 'Duplex',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Property Details')
                    ->tabs([
                        Tab::make('Basic Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Property Name')
                                    ->placeholder('e.g., Modern Downtown Apartment')
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->required()
                                    ->label('URL Slug')
                                    ->placeholder('e.g., modern-downtown-apartment')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->required()
                                    ->label('Description')
                                    ->placeholder('Provide a detailed description of the property...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Property Details')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Select::make('categories')
                                    ->label('Categories')
                                    ->multiple()
                                    ->required()
                                    ->options(self::$categories)
                                    ->columnSpan('full'),
                                TextInput::make('city')
                                    ->required()
                                    ->label('City')
                                    ->placeholder('e.g., Dubai'),
                                TextInput::make('state')
                                    ->required()
                                    ->label('State/Province')
                                    ->placeholder('e.g., Dubai Emirate'),
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->label('Price')
                                    ->prefix('$')
                                    ->step(0.01),
                                TextInput::make('bedrooms')
                                    ->numeric()
                                    ->label('Bedrooms')
                                    ->default(0)
                                    ->minValue(0),
                                TextInput::make('bathrooms')
                                    ->numeric()
                                    ->label('Bathrooms')
                                    ->default(0)
                                    ->minValue(0),
                                TextInput::make('space')
                                    ->numeric()
                                    ->label('Space (Sq. Ft)')
                                    ->placeholder('e.g., 2500')
                                    ->minValue(0),
                            ])
                            ->columns(2),

                        Tab::make('Relationships')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Select::make('project_id')
                                    ->label('Project')
                                    ->options(Project::query()->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->nullable(),
                                Select::make('agent_id')
                                    ->label('Agent')
                                    ->options(Agent::query()->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->nullable(),
                            ])
                            ->columns(2),

                        Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('images')
                                    ->label('Property Images')
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(10)
                                    ->columnSpanFull()
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth(1920)
                                    ->imageResizeTargetHeight(1080),
                            ]),

                        Tab::make('Status & Visibility')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Toggle::make('status')
                                    ->label('Active')
                                    ->default(true),
                                Toggle::make('is_featured')
                                    ->label('Featured'),
                                Toggle::make('is_for_rent')
                                    ->label('Available for Rent'),
                                Toggle::make('is_for_sale')
                                    ->label('Available for Sale'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}