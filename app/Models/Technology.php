<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'color', 'row', 'sort_order', 'published'])]
class Technology extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published' => 'boolean',
        ];
    }

    /** @param Builder<Technology> $query */
    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    /** @param Builder<Technology> $query */
    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderBy('name');
    }

    public function getIconUrlAttribute(): string
    {
        // Simple Icons CDN: tanpa warna = warna brand asli
        return $this->color
            ? "https://cdn.simpleicons.org/{$this->slug}/".ltrim($this->color, '#')
            : "https://cdn.simpleicons.org/{$this->slug}";
    }
}