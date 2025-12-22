<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LeadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('الاسم'),
                TextEntry::make('email')
                    ->label('البريد الإلكتروني')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-')
                    ->label('رقم الهاتف'),
                TextEntry::make('time_range_to_contact')
                    ->placeholder('-')
                    ->label('وقت التواصل'),
                TextEntry::make('property_id')
                    ->numeric()
                    ->placeholder('-')
                    ->label('رقم العقار'),
                TextEntry::make('agent_id')
                    ->numeric()
                    ->placeholder('-')
                    ->label('رقم الوكيل'),
                TextEntry::make('message')
                    ->placeholder('-')
                    ->columnSpanFull()
                    ->label('الرسالة'),
                TextEntry::make('status')
                    ->label('الحالة'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label('تاريخ الإنشاء'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label('تاريخ التحديث'),
            ]);
    }
}
