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
        'residential' => 'Residential',
        'commercial' => 'Commercial',
        'mixed-use' => 'Mixed Use',
        'industrial' => 'Industrial',
        'luxury' => 'Luxury',
        'affordable' => 'Affordable Housing',
        'gated-community' => 'Gated Community',
        'waterfront' => 'Waterfront',
        'golf-course' => 'Golf Course',
        'eco-friendly' => 'Eco-Friendly',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Project Details')
                    ->tabs([
                        Tab::make('Basic Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Project Name')
                                    ->placeholder('e.g., Downtown Heights Development')
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->required()
                                    ->label('URL Slug')
                                    ->placeholder('e.g., downtown-heights-development')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->required()
                                    ->label('Description')
                                    ->placeholder('Provide a detailed description of the project...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Location & Categories')
                            ->icon('heroicon-o-map-pin')
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
                            ])
                            ->columns(2),

                        Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('images')
                                    ->label('Project Images')
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(15)
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
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
