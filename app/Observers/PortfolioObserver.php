<?php

namespace App\Observers;

use App\Models\Portfolio;
use Illuminate\Support\Str;

class PortfolioObserver
{
    /**
     * Handle the Portfolio "creating" event.
     */
    public function creating(Portfolio $portfolio): void
    {
        if (empty($portfolio->slug)) {
            $portfolio->slug = $this->generateUniqueSlug($portfolio->title);
        }
    }

    /**
     * Handle the Portfolio "updating" event.
     */
    public function updating(Portfolio $portfolio): void
    {
        if ($portfolio->isDirty('title')) {
            $portfolio->slug = $this->generateUniqueSlug($portfolio->title, $portfolio->id);
        }
    }

    /**
     * Generate a unique slug for the portfolio.
     */
    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 2;

        while (
            Portfolio::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
}
