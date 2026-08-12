<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                ImageColumn::make('thumbnail')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl(url('/favicon.ico')),
                TextColumn::make('title')
                    ->searchable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->summary),
                TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'web' => 'info',
                        'ml' => 'success',
                        'mobile' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                ToggleColumn::make('featured'),
                ToggleColumn::make('published'),
                TextColumn::make('sort_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'web' => 'Web',
                        'ml' => 'Machine Learning',
                        'mobile' => 'Mobile',
                        'other' => 'Other',
                    ]),
                TernaryFilter::make('featured'),
                TernaryFilter::make('published'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
