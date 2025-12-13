<?php

namespace App\Http\Controllers;

use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use App\Services\Facades\PortfolioFacade;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioController extends Controller
{
    /**
     * List all portfolios
     */
    public function index(): AnonymousResourceCollection
    {
        return PortfolioFacade::index();
    }

    /**
     * Show Specific portfolio
     */
    public function show(Portfolio $portfolio)
    {
        return PortfolioResource::make($portfolio);
    }
}
