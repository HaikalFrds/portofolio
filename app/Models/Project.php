<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'slug',
    'category',
    'summary',
    'description',
    'tech_stack',
    'thumbnail',
    'repo_url',
    'demo_url',
    'meta',
    'featured',
    'sort_order',
    'published',
])]
class Project extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'meta' => 'array',
            'featured' => 'boolean',
            'published' => 'boolean',
        ];
    }

    // Route pakai slug: /projects/{project}
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** @param Builder<Project> $query */
    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    /** @param Builder<Project> $query */
    public function scopeFeatured(Builder $query): void
    {
        $query->where('featured', true);
    }

    /** @param Builder<Project> $query */
    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderByDesc('id');
    }
}
