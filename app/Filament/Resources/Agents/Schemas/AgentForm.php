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
                    ->required()
                    ->label('الاسم'),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('agents')
                    ->label('الصورة'),
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->label('رقم الهاتف'),
                Toggle::make('status')
                    ->required()
                    ->label('الحالة'),
                TextInput::make('rating')
                    ->numeric()
                    ->default(0)
                    ->label('التقييم'),
                TextInput::make('bio')
                    ->label('نبذة'),
            ]);
    }
}
