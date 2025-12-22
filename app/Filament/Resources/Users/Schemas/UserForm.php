<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('تفاصيل المستخدم')
                    ->tabs([
                        Tab::make('المعلومات الأساسية')
                            ->icon('heroicon-o-user')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('الاسم الكامل')
                                    ->placeholder('مثال: محمد أحمد')
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->label('البريد الإلكتروني')
                                    ->placeholder('مثال: user@example.com')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                TextInput::make('password')
                                    ->password()
                                    ->label('كلمة المرور')
                                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->placeholder('أدخل كلمة المرور')
                                    ->revealable()
                                    ->minLength(8),
                                TextInput::make('password_confirmation')
                                    ->password()
                                    ->label('تأكيد كلمة المرور')
                                    ->dehydrated(false)
                                    ->same('password')
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->placeholder('أعد إدخال كلمة المرور')
                                    ->revealable(),
                            ])
                            ->columns(2),

                        Tab::make('الأدوار والصلاحيات')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Select::make('roles')
                                    ->label('الأدوار')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->columnSpanFull(),
                                CheckboxList::make('permissions')
                                    ->label('الصلاحيات المباشرة')
                                    ->relationship('permissions', 'name')
                                    ->searchable()
                                    ->columns(3)
                                    ->gridDirection('row')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
