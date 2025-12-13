<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Services\Facades\SubscriberFacade;

class SubscriberController extends Controller
{
    /**
     * Store The Subscribtion
     */
    public function store(SubscriberRequest $request): SubscriberResource
    {
        return SubscriberFacade::store($request);
    }
}
