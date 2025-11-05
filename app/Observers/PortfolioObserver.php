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
            $portfolio->slug = Str::slug($portfolio->title);
        }
    }

    /**
     * Handle the Portfolio "updating" event.
     */
    public function updating(Portfolio $portfolio): void
    {
        if ($portfolio->isDirty('title')) {
            $portfolio->slug = Str::slug($portfolio->title);
        }
    }
}
