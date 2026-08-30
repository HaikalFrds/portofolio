<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('role')
                    ->required()
                    ->helperText('Jabatan/posisi, misal: ML Developer'),
                TextInput::make('organization')
                    ->required()
                    ->helperText('Perusahaan/organisasi/kampus'),
                Select::make('type')
                    ->required()
                    ->default('work')
                    ->options([
                        'work' => 'Work',
                        'internship' => 'Internship',
                        'organization' => 'Organization',
                        'education' => 'Education',
                    ]),
                TextInput::make('location')
                    ->helperText('Kota / Remote'),
                DatePicker::make('start_date')
                    ->required()
                    ->native(false),
                DatePicker::make('end_date')
                    ->native(false)
                    ->helperText('Kosongkan kalau masih berjalan'),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),
                TagsInput::make('highlights')
                    ->placeholder('Ketik lalu Enter')
                    ->helperText('Poin pencapaian, satu per baris')
                    ->columnSpanFull(),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('experiences')
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth(256)
                    ->imageResizeTargetHeight(256)
                    ->maxSize(2048),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('published')
                    ->default(true),
            ]);
    }
}