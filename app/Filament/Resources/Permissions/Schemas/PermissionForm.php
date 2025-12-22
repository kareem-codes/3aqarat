<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('اسم الصلاحية')
                    ->placeholder('مثال: view_properties, create_agents')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('guard_name')
                    ->default('web')
                    ->label('اسم الحارس')
                    ->disabled()
                    ->dehydrated()
                    ->columnSpanFull(),
            ]);
    }
}
