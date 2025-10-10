<?php

namespace App\Services\Services;

use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\PortfolioResource;
use App\Http\Resources\UserResource;
use App\Models\Portfolio;
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
        $data = array_merge(
            ['user_id' => Auth::id()],
            $request->validated()
        );

        if (isset($data['technologies']) && is_array($data['technologies'])) {
            $data['technologies'] = json_encode($data['technologies']);
        }

        $portfolio = Portfolio::create($data);

        return PortfolioResource::make($portfolio);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return PortfolioResource::make($portfolio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->validated();

        if (isset($data['technologies']) && is_array($data['technologies'])) {
            $data['technologies'] = json_encode($data['technologies']);
        }

        $portfolio->update($data);

        return new PortfolioResource($portfolio->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        return $portfolio->delete();
    }
}