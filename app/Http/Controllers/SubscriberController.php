<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Store The Subscribtion
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
