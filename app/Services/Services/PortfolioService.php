<?php

namespace App\Services\Services;

use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use App\Models\User;
use App\Services\Constructors\PortfolioConstructor;

class PortfolioService implements PortfolioConstructor
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PortfolioResource::collection(
            Portfolio::paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {
        $portfolio = $request->validated();

        if ($request->hasFile('image')) {
            $portfolio['image'] = $request->file('image')->store('portfolios', 'public');
        }
        
        return PortfolioResource::create($portfolio);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}