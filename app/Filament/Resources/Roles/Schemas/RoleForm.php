<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Role Details')
                    ->tabs([
                        Tab::make('Basic Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Role Name')
                                    ->placeholder('e.g., Admin, Editor, Viewer')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                TextInput::make('guard_name')
                                    ->default('web')
                                    ->label('Guard Name')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Permissions')
                            ->icon('heroicon-o-key')
                            ->schema([
                                CheckboxList::make('permissions')
                                    ->label('Assign Permissions')
                                    ->relationship('permissions', 'name')
                                    ->searchable()
                                    ->columns(3)
                                    ->gridDirection('row')
                                    ->columnSpanFull()
                                    ->bulkToggleable(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
