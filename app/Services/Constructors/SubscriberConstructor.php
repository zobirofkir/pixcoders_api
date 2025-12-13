<?php

namespace App\Services\Constructors;

use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\SubscriberResource;

interface SubscriberConstructor
{
    /**
     * store the subscribtion
     */
    public function store(SubscriberRequest $request): SubscriberResource;
}
