<?php

namespace App\Filament\Resources\Agents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AgentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->required()
                    ->tel(),
                Toggle::make('status')
                    ->required(),
                TextInput::make('rating')
                    ->numeric()
                    ->default(0),
                TextInput::make('bio'),
            ]);
    }
}
