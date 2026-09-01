<?php

namespace App\Filament\Resources\Technologies\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TechnologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug((string) $state, '')))
                    ->helperText('Nama tampilan, misal: Tailwind CSS'),
                TextInput::make('slug')
                    ->required()
                    ->helperText('Slug Simple Icons — cek di simpleicons.org. Contoh: tailwindcss, laravel, python'),
                ColorPicker::make('color')
                    ->helperText('Kosongkan untuk memakai warna brand aslinya'),
                Select::make('row')
                    ->required()
                    ->default(1)
                    ->options([
                        1 => 'Baris 1 (geser ke kiri)',
                        2 => 'Baris 2 (geser ke kanan)',
                    ]),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('published')
                    ->default(true),
            ]);
    }
}