<?php

namespace App\Services\Services;

use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use App\Services\Constructors\PortfolioConstructor;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioService implements PortfolioConstructor
{
    /**
     * List All Portfolios
     */
    public function index(): AnonymousResourceCollection
    {
        return PortfolioResource::collection(
            Portfolio::with('user')->orderBy('id', 'desc')->get()
        );
    }

    /**
     * Show Portfolio
     */
    public function show(Portfolio $portfolio): PortfolioResource
    {
        return PortfolioResource::make($portfolio);
    }
}
