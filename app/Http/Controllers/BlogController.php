<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Services\Facades\BlogFacade;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogController extends Controller
{
    /**
     * List all blogs
     */
    public function index(): AnonymousResourceCollection
    {
        return BlogFacade::index();
    }

    /**
     * Show Specific blog
     */
    public function show(Blog $blog): BlogResource
    {
        return BlogFacade::show($blog);
    }
}
