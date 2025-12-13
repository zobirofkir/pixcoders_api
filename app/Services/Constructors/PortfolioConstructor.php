<?php

namespace App\Services\Constructors;

use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface PortfolioConstructor
{
    /**
     * List all portfolios
     */
    public function index(): AnonymousResourceCollection;

    /**
     * Show Portfolio
     */
    public function show(Portfolio $portfolio): PortfolioResource;
}
