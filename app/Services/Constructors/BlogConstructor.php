<?php

namespace App\Services\Constructors;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface BlogConstructor
{
    /**
     * List all blogs
     */
    public function index(): AnonymousResourceCollection;

    /**
     * Show specific blog
     */
    public function show(Blog $blog): BlogResource;
}
