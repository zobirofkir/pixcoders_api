<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\User;
use App\Services\Facades\PortfolioFacade;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PortfolioFacade::index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {
        return PortfolioFacade::store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return PortfolioFacade::show($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, User $user)
    {
        return PortfolioFacade::update($request , $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return PortfolioFacade::destroy($user);
    }
}
