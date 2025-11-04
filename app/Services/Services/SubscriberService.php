<?php

namespace App\Services\Services;

use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Services\Constructors\SubscriberConstructor;

class SubscriberService implements SubscriberConstructor
{
    /**
     * Store the subscription
     */
    public function store(SubscriberRequest $request) : SubscriberResource
    {
        return SubscriberResource::make(
            Subscriber::create(
                $request->validated()
            )
        );
    }
}