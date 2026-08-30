<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'role',
    'organization',
    'type',
    'location',
    'start_date',
    'end_date',
    'description',
    'highlights',
    'logo',
    'sort_order',
    'published',
])]
class Experience extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'highlights' => 'array',
            'published' => 'boolean',
        ];
    }

    /** @param Builder<Experience> $query */
    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    /** @param Builder<Experience> $query */
    public function scopeOrdered(Builder $query): void
    {
        // yang masih berjalan (end_date null) di atas, lalu terbaru
        $query->orderBy('sort_order')->orderByRaw('end_date IS NULL DESC')->orderByDesc('start_date');
    }

    public function getIsCurrentAttribute(): bool
    {
        return $this->end_date === null;
    }
}