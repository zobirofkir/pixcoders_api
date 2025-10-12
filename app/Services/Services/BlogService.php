<?php

namespace App\Services\Services;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Services\Constructors\BlogConstructor;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogService implements BlogConstructor
{
    /**
     * List all blogs
     */
    public function index() : AnonymousResourceCollection
    {
        return BlogResource::collection(
            Blog::with('user')->latest()->get()
        );
    }

    /**
     * Show specific blog
     */
    public function show(Blog $blog) : BlogResource
    {
        return BlogResource::make($blog);
    }
}