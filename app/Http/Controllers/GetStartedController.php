<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetStartedRequest;
use App\Http\Resources\GetStartedResource;
use App\Models\GetStarted;
use Illuminate\Http\Request;

class GetStartedController extends Controller
{
    /**
     * Get Started
     */
    public function store(GetStartedRequest $request) : GetStartedResource
    {
        return GetStartedResource::make(
            GetStarted::create($request->validated())
        );
    }
}
