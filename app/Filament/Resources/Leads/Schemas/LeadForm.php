<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('الاسم'),
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email(),
                TextInput::make('phone')
                    ->tel()
                    ->label('رقم الهاتف'),
                TextInput::make('time_range_to_contact')
                    ->label('وقت التواصل'),
                TextInput::make('property_id')
                    ->numeric()
                    ->label('رقم العقار'),
                TextInput::make('agent_id')
                    ->numeric()
                    ->label('رقم الوكيل'),
                Textarea::make('message')
                    ->columnSpanFull()
                    ->label('الرسالة'),
                TextInput::make('status')
                    ->required()
                    ->default('new')
                    ->label('الحالة'),
            ]);
    }
}
