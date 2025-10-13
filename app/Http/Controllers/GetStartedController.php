<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetStartedRequest;
use App\Http\Resources\GetStartedResource;
use App\Models\GetStarted;
use Illuminate\Http\Request;
use App\Mail\GetStartedMail;
use Illuminate\Support\Facades\Mail;

class GetStartedController extends Controller
{
    /**
     * Get Started
     */
    public function store(GetStartedRequest $request): GetStartedResource
    {
        $data = $request->validated();

        $getStarted = GetStarted::create($data);

        Mail::to('zobirofkir19@gmail.com')->send(new GetStartedMail($data));

        return GetStartedResource::make($getStarted);
    }
}


