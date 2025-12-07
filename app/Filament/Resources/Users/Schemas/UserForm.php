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
                Tabs::make('User Details')
                    ->tabs([
                        Tab::make('Basic Information')
                            ->icon('heroicon-o-user')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Full Name')
                                    ->placeholder('e.g., John Doe')
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->label('Email Address')
                                    ->placeholder('e.g., john@example.com')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                TextInput::make('password')
                                    ->password()
                                    ->label('Password')
                                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->placeholder('Enter password')
                                    ->revealable()
                                    ->minLength(8),
                                TextInput::make('password_confirmation')
                                    ->password()
                                    ->label('Confirm Password')
                                    ->dehydrated(false)
                                    ->same('password')
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->placeholder('Confirm password')
                                    ->revealable(),
                            ])
                            ->columns(2),

                        Tab::make('Roles & Permissions')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Select::make('roles')
                                    ->label('Roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->columnSpanFull(),
                                CheckboxList::make('permissions')
                                    ->label('Direct Permissions')
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
