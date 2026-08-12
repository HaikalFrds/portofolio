<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug((string) $state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Dipakai di URL: /projects/{slug}'),
                Select::make('category')
                    ->required()
                    ->default('web')
                    ->options([
                        'web' => 'Web',
                        'ml' => 'Machine Learning',
                        'mobile' => 'Mobile',
                        'other' => 'Other',
                    ]),
                TextInput::make('summary')
                    ->maxLength(255)
                    ->helperText('Deskripsi singkat buat card')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->rows(6)
                    ->columnSpanFull(),
                TagsInput::make('tech_stack')
                    ->placeholder('Ketik lalu Enter')
                    ->helperText('Contoh: Laravel, Tailwind, Python')
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('projects')
                    ->helperText('Gambar cover (opsional)'),
                TextInput::make('repo_url')
                    ->url(),
                TextInput::make('demo_url')
                    ->url(),
                KeyValue::make('meta')
                    ->keyLabel('Field')
                    ->valueLabel('Nilai')
                    ->helperText('Field khusus, misal ML: accuracy, model, notebook_url')
                    ->columnSpanFull(),
                Toggle::make('featured')
                    ->helperText('Tampil di home'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('published')
                    ->default(true),
            ]);
    }
}
