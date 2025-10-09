<?php

namespace App\Services\Services;

use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use App\Models\User;
use App\Services\Constructors\PortfolioConstructor;
use Illuminate\Support\Facades\Auth;

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
        return PortfolioResource::make(
            Portfolio::create(
                array_merge(
                    ["user_id" => Auth::user()->id],
                    $request->validated()
                )
            )
        );
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