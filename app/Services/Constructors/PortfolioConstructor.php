<?php

namespace App\Services\Constructors;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\User;

interface PortfolioConstructor
{
    /**
     * Display a listing of the resource.
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request);

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio);

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio);

}