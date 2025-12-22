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
                Tabs::make('تفاصيل الدور')
                    ->tabs([
                        Tab::make('المعلومات الأساسية')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('اسم الدور')
                                    ->placeholder('مثال: مدير، محرر، مشاهد')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                TextInput::make('guard_name')
                                    ->default('web')
                                    ->label('اسم الحارس')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('الصلاحيات')
                            ->icon('heroicon-o-key')
                            ->schema([
                                CheckboxList::make('permissions')
                                    ->label('تعيين الصلاحيات')
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
